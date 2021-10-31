<?php

namespace App\Models;

use CodeIgniter\Database\BaseResult;
use CodeIgniter\Model;
use ReflectionException;
use function PHPUnit\Framework\isNull;

class ContactFormModel extends Model {

    protected $table = 'bnn_contact_form';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = TRUE;
    protected $returnType = 'array';
    protected $useSoftDeletes = TRUE;
    protected $allowedFields = [
        'sender_name',
        'sender_email',
        'sender_telephone',
        'message_title',
        'message_text',
        'custom_fields',
        'admin_response',
        'responded_by'
    ];
    protected $useTimestamps = TRUE;
    protected $createdField = 'created_at';
    protected $updatedField = 'responded_at';

    /**
     * Insert the message from the default contact form and return the insert ID
     * @param string $senderName
     * @param string $senderEmail
     * @param string $senderTelephone
     * @param string $messageTitle
     * @param string $messageText
     * @param null|array $customFields
     * @return BaseResult|false|int|object|string
     * @throws ReflectionException
     */
    public function addMessage(string $senderName, string $senderEmail, string $senderTelephone, string $messageTitle, string $messageText, $customFields = NULL)
    {
        $customFieldsValue = NULL;
        if ( ! isNull($customFields) && is_array($customFields))
        {
            $customFieldsValue = json_encode($customFields);
        }
        $data = [
            'sender_name' => $senderName,
            'sender_email' => $senderEmail,
            'sender_telephone' => $senderTelephone,
            'message_title' => $messageTitle,
            'message_text' => $messageText,
            'custom_fields' => $customFieldsValue
        ];
        return $this->insert($data);
    }

    /**
     * Add response by admin
     * @param int $id ID of the message
     * @param string $adminResponse The response note
     * @param int $respondedBy User ID of the admin who responded to the message
     * @return bool
     * @throws ReflectionException
     */
    public function addResponseNote(int $id, string $adminResponse, int $respondedBy)
    {
        $data = [
            'id' => $id,
            'admin_response' => $adminResponse,
            'responded_by' => $respondedBy
        ];
        return $this->save($data);
    }

}