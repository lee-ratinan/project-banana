<?php


namespace App\Controllers;


class Admin extends BaseController {

    private $data;

    public function __construct()
    {
        $this->data['siteInfo'] = config('Banana');
        $this->data['locale'] = 'en-US';
    }

    public function dashboard()
    {
        $this->data['pageSlug'] = 'dashboard';
        return view('dashboard', $this->data);
    }
}