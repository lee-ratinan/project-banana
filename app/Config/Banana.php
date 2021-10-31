<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Banana extends BaseConfig
{
    /*
     * --------------------------------------------------------------------------
     * USERNAME OPTIONS
     * --------------------------------------------------------------------------
     */
    const USERNAME_OPTION_EMAIL = '1';
    const USERNAME_OPTION_TELEPHONE = '2';
    const USERNAME_OPTION_BOTH = '3';
    const USERNAME_OPTION_ANY = '4';

    /*
     * --------------------------------------------------------------------------
     * HOMEPAGE OPTION
     * --------------------------------------------------------------------------
     */
    const HOMEPAGE_OPTION_STATIC = '1';
    const HOMEPAGE_OPTION_BLOG = '2';
    const HOMEPAGE_OPTION_PAGE = '3';

    /*
     * --------------------------------------------------------------------------
     * SITE INFORMATION
     * --------------------------------------------------------------------------
     */
    public $siteName  = 'Project Banana';
    public $siteAuthor = 'Nat Lee';
    public $siteTwitterInfo = '@RatinanLee';
    public $siteFacebookInfo = 'Rongqin Lee';
    /*
     * --------------------------------------------------------------------------
     * GENERIC FOOTER INFO
     * --------------------------------------------------------------------------
     */
    public $siteCopyrightYear = '2021';
    public $siteCopyrightBy = 'Nat Lee';
    public $siteCompanyName = 'Nat Lee';
    public $siteEmail = 'john.doe@example.com';
    public $siteAddress = '100 Main Street Cincinnati OH 45202';

    /*
     * --------------------------------------------------------------------------
     * USER OPTIONS
     * --------------------------------------------------------------------------
     */

    /*
     * --------------------------------------------------------------------------
     * Allow public registration
     * --------------------------------------------------------------------------
     * TRUE to allow anyone to sign up for the new account
     * FALSE to hide the sign up form
     */
    public $userAllowPublicRegistration = TRUE;
    /*
     * --------------------------------------------------------------------------
     * Number of days until the password expires
     * --------------------------------------------------------------------------
     * FALSE if never expires
     * any positive numbers are number of days until the password expiry
     */
    public $userPasswordLifespan = 90;
    /*
     * --------------------------------------------------------------------------
     * Show forget password option
     * --------------------------------------------------------------------------
     * TRUE to allow user to reset password themselves
     * FALSE if the users needs to get the admin to reset the password for them
     */
    public $userShowForgetPassword = TRUE;
    /*
     * --------------------------------------------------------------------------
     * Username option
     * --------------------------------------------------------------------------
     * EMAIL = Only email is accepted
     * TELEPHONE = Only telephone number is accepted (E.162 format in the database)
     * BOTH = Only email or telephone number is accepted
     * ANY = Any unique string (that matches the rule) is accepted
     */
    public $usernameOption = self::USERNAME_OPTION_EMAIL;

    /*
     * --------------------------------------------------------------------------
     * HOMEPAGE OPTIONS
     * --------------------------------------------------------------------------
     */

    /*
     * --------------------------------------------------------------------------
     * Site Homepage
     * --------------------------------------------------------------------------
     * STATIC = A file name 'homepage' in view will be retrieve and shown as homepage
     * BLOG = A default blog will be shown as homepage
     * PAGE = A default page will be shown as homepage
     */
    public $siteHomepageOption = self::HOMEPAGE_OPTION_STATIC;
}