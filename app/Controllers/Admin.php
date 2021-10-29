<?php


namespace App\Controllers;


class Admin extends BaseController {

    private $data;

    public function __construct()
    {
        $this->data['locale'] = 'en-US';
    }

    public function dashboard()
    {
        return view('dashboard', $this->data);
    }
}