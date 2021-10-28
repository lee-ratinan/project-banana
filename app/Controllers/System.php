<?php

namespace App\Controllers;

class System extends BaseController {

    /**
     * Not Found - 404 Page
     */
    public function not_found()
    {
        $this->response->setStatusCode(HTTP_RESPONSE_NOT_FOUND);
        echo 'not found';
    }

    /**
     * Not Authorized - 401 Page
     */
    public function not_authorized()
    {
        $this->response->setStatusCode(HTTP_RESPONSE_NOT_AUTHORIZED);
        echo 'not authorized';
    }

    /**
     * Method Not Allowed - 405 Page
     */
    public function method_not_allowed()
    {
        $this->response->setStatusCode(HTTP_RESPONSE_METHOD_NOT_ALLOWED);
        echo 'method not allowed';
    }
}
