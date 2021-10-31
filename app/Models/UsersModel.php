<?php

namespace App\Models;

use CodeIgniter\Model;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;
use ReflectionException;

class UsersModel extends Model {

    const USERNAME_TYPE_EMAIL = 'EMAIL';
    const USERNAME_TYPE_TELEPHONE = 'TELEPHONE';
    const USERNAME_TYPE_ANY = 'ANY';

    const USER_STATUS_PENDING_APPROVAL = 'PENDING_APPROVAL';
    const USER_STATUS_ACTIVE = 'ACTIVE';
    const USER_STATUS_SUSPENDED = 'SUSPENDED';

    const USER_TYPE_PUBLIC_USER = 'PUBLIC_USER';
    const USER_TYPE_ADMIN = 'ADMIN';
    const USER_TYPE_SUPER_ADMIN = 'SUPER_ADMIN';

    const UNIQUE_FIELD_ID = 'id';
    const UNIQUE_FIELD_USERNAME = 'username';
    const UNIQUE_FIELD_EMAIL = 'user_email';
    const UNIQUE_FIELD_PHONE = 'user_phone';

    const USER_PASSWORD_HASH = 'SHA256';

    protected $table = 'bnn_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'username',
        'username_type',
        'password',
        'password_expiry',
        'user_status',
        'user_email',
        'user_phone',
        'user_first_name',
        'user_last_name',
        'user_gender',
        'user_type',
        'user_locale',
        'registered_by',
        'updated_by',
        'suspended_by'
    ];
    protected $uniqueFields = [
        'id',
        'username',
        'user_email',
        'user_phone',
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'suspended_at';

    /**
     * Get user by $columnName
     * @param string $columnName Use the constant of this class, either UNIQUE_FIELD_ID, UNIQUE_FIELD_USERNAME, UNIQUE_FIELD_EMAIL, or UNIQUE_FIELD_PHONE
     * @param string|int $value The value to find
     * @return array|bool|null
     */
    public function getUserBy(string $columnName, $value)
    {
        if ( ! in_array($columnName, $this->uniqueFields))
        {
            return FALSE;
        }
        $user = $this->where($columnName, $value)->first();
        if (empty($user))
        {
            return NULL;
        }
        $user['user_email_link'] = 'mailto:' . $user['user_email'];
        $phoneUtil = PhoneNumberUtil::getInstance();
        try
        {
            $phoneObj = $phoneUtil->parse($user['user_phone'], NULL);
        } catch (NumberParseException $e)
        {
            $user['user_phone_number_international'] = '';
            $user['user_phone_number_national'] = '';
            $user['user_phone_number_link'] = '';
            return $user;
        }
        $user['user_phone_number_international'] = $phoneUtil->format($phoneObj, PhoneNumberFormat::INTERNATIONAL);
        $user['user_phone_number_national'] = $phoneUtil->format($phoneObj, PhoneNumberFormat::NATIONAL);
        $user['user_phone_number_link'] = $phoneUtil->format($phoneObj, PhoneNumberFormat::RFC3966);
        return $user;
    }

    /**
     * Retrieve user for authentication
     * @param string $userName User's username, could be any string, an email address, or a telephone number (with country code)
     * @param string $hashedPassword The password that is already hashed
     * @return array The array of user, with status and error message if not found or failed to authenticate
     */
    public function authenticateUser(string $userName, string $hashedPassword)
    {
        $user = $this->getUserBy(self::UNIQUE_FIELD_USERNAME, $userName);
        if (empty($user))
        {
            return [
                'status' => 0,
                'message' => 'NOT_EXIST',
                'userObject' => NULL
            ];
        } else if ($user['user_status'] != self::USER_STATUS_ACTIVE)
        {
            return [
                'status' => 0,
                'message' => 'USER_NOT_ACTIVE',
                'userObject' => $user
            ];
        } else if ($hashedPassword != $user['password'])
        {
            return [
                'status' => 0,
                'message' => 'WRONG_PASSWORD',
                'userObject' => $user
            ];
        } else if (date(FORMAT_DATE_MYSQL) > $user['password_expiry'])
        {
            return [
                'status' => 0,
                'message' => 'PASSWORD_EXPIRED',
                'userObject' => $user
            ];
        }
        return [
            'status' => 1,
            'message' => NULL,
            'userObject' => $user
        ];
    }

    /**
     * Insert user
     * @param string $userName
     * @param string $userNameType
     * @param string $hashedPassword
     * @param string $emailAddress
     * @param string $phoneNumber
     * @param string $countryCode
     * @param string $userType
     * @param string $userLocale
     * @param int|null $registeredBy (optional)
     * @return array
     * @throws ReflectionException
     */
    public function insertUser(string $userName, string $userNameType, string $hashedPassword, string $emailAddress, string $phoneNumber, string $countryCode, string $userType, string $userLocale, $registeredBy = NULL)
    {
        // PASSWORD_EXPIRY
        $passwordLifeSpan = config('Banana')->userPasswordLifespan;
        $passwordExpiry = NULL;
        if (is_numeric($passwordLifeSpan) && 0 < $passwordLifeSpan)
        {
            $passwordExpiry = date(FORMAT_DATE_MYSQL, strtotime('+' . $passwordLifeSpan . ' DAYS'));
        }
        // USER_EMAIL
        $userEmail = NULL;
        if ( ! empty($emailAddress))
        {
            $userEmail = filter_var($emailAddress, FILTER_VALIDATE_EMAIL);
            if ( ! $userEmail)
            {
                return [
                    'status' => 0,
                    'message' => 'EMAIL_INVALID',
                    'userId' => 0
                ];
            }
        }
        // USER_PHONE
        $userPhone = NULL;
        if ( ! empty($phoneNumber))
        {
            $phoneUtil = PhoneNumberUtil::getInstance();
            try
            {
                $phoneObj = $phoneUtil->parse($phoneNumber, $countryCode);
            } catch (NumberParseException $e)
            {
                return [
                    'status' => 0,
                    'message' => 'ERROR_PARSE_PHONE_NUMBER',
                    'userId' => 0
                ];
            }
            if ( ! $phoneUtil->isPossibleNumber($phoneObj))
            {
                return [
                    'status' => 0,
                    'message' => 'INVALID_PHONE',
                    'userId' => 0
                ];
            }
            $userPhone = $phoneUtil->format($phoneObj, \libphonenumber\PhoneNumberFormat::E164);
        }
        // USER_TYPE
        if ( ! in_array($userType, [self::USER_TYPE_PUBLIC_USER, self::USER_TYPE_ADMIN, self::USER_TYPE_SUPER_ADMIN]))
        {
            return [
                'status' => 0,
                'message' => 'INVALID_USER_TYPE',
                'userId' => 0
            ];
        }
        // USER_LOCALE
        $supportedLocale = config('App')->supportedLocales;
        if ( ! in_array($userLocale, $supportedLocale))
        {
            $userLocale = config('App')->defaultLocale;
        }
        // REGISTERED_BY
        if ( ! is_null($registeredBy))
        {
            if (0 >= intval($registeredBy) || ! is_numeric($registeredBy))
            {
                return [
                    'status' => 0,
                    'message' => 'INVALID_REGISTERED_BY_ID',
                    'userId' => 0
                ];
            }
        }
        $data = [
            'username' => $userName,
            'username_type' => $userNameType,
            'password' => $hashedPassword,
            'password_expiry' => $passwordExpiry,
            'user_status' => self::USER_STATUS_PENDING_APPROVAL,
            'user_email' => $userEmail,
            'user_phone' => $userPhone,
            'user_type' => $userType,
            'user_locale' => $userLocale,
            'registered_by' => $registeredBy
        ];
        $userId = $this->insert($data);

    }
}