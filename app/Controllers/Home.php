<?php

namespace App\Controllers;

class Home extends BaseController
{
    /**
     * This is the home page
     * Check settings table, key: homepage for the action to do.
     * - 'STATIC': Show static home page
     * - 'BLOG': Show the blog page
     */
    public function index()
    {
        echo 'HOME PAGE';
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
