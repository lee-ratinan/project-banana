<?php

namespace App\Controllers;

class Home extends BaseController {

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
        $home_page = $setting_model->getSettingValueByKey('homepage');
        if ('static' == $home_page)
        {
            return view('homepage');
        } else if ('blog' == $home_page)
        {
            echo 'go to blog';
        } else if ('page' == $home_page)
        {
            echo 'query the page';
        }
    }

    public function login()
    {
        echo 'LOG IN';
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
