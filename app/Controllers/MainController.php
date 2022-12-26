<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    /**
     * Configuration
     *
     * @var \IonAuth\Config\IonAuth
     */
    protected $configIonAuth;

    /**
     * IonAuth library
     *
     * @var \IonAuth\Libraries\IonAuth
     */
    protected $ionAuth;

    /**
     * Session
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    /**
     * Validation library
     *
     * @var \CodeIgniter\Validation\Validation
     */
    protected $validation;
    public function __construct()
    {
        $this->ionAuth    = new \App\Libraries\IonAuth();
        $this->validation = \Config\Services::validation();
        $this->configIonAuth = config('IonAuth');
        $this->session       = \Config\Services::session();
    }

    public function template($view, $data)
    {
        return view('layout/header') .
            view($view, $data) .
            view('layout/footer');
    }
}
