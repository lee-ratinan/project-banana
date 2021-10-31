<?php

namespace App\Controllers;

use Config\Banana;

class Home extends BaseController {

    /**
     * @var array The array of variables to be sent to view
     */
    private $data;

    /**
     * Check whether the locale in the URL is supported by the system or not
     * @return bool
     */
    private function checkLocaleFromUri()
    {
        $currentUrl = current_url();
        $baseUrl = base_url();
        $path = str_replace($baseUrl, '', $currentUrl);
        $segments = explode('/', $path);
        $currentLocale = $segments[1];
        if (empty($currentLocale))
        {
            // Empty locale, always use default
            return TRUE;
        }
        $locales = config('App')->supportedLocales;
        // Not empty locale, and check the locale against the supported locales.
        return in_array($currentLocale, $locales);
    }

    /**
     * Home constructor
     */
    public function __construct()
    {
        $this->data['siteInfo'] = config('Banana');
        $this->data['locale'] = service('request')->getLocale();
        if ( ! $this->checkLocaleFromUri())
        {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    /**
     * This is the home page
     * Check settings table, key: homepage for the action to do.
     * - 'STATIC': Show static home page
     * - 'BLOG': Show the blog page
     * - 'PAGE': Show the page from DB
     */
    public function index()
    {
        $setting_model = new \App\Models\SettingsModel();
        $home_page = $this->data['siteInfo']->siteHomepageOption;
        if (Banana::HOMEPAGE_OPTION_STATIC == $home_page)
        {
            return view('homepage', $this->data);
        } else if (Banana::HOMEPAGE_OPTION_BLOG == $home_page)
        {
            echo 'go to blog';
        } else if (Banana::HOMEPAGE_OPTION_PAGE == $home_page)
        {
            echo 'query the page';
        }
    }

    public function login()
    {
        return view('login', $this->data);
    }

    public function login_do()
    {
        //
    }

    public function logout_do()
    {
        //
    }

    public function forget_password_do()
    {
        //
    }

    public function register_do()
    {
        //
    }

    public function reset_password()
    {
        echo 'RESET PASSWORD (needs token from email)';
    }

    public function reset_password_do()
    {
        //
    }

    public function page($page_title_1, $page_title_2 = '')
    {
        echo 'THIS IS A PAGE: ' . $page_title_1 . '/' . $page_title_2;
    }
}
