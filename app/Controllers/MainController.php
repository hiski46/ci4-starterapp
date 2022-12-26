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

    public function template($view, $data, $type = 'dashboard')
    {
        if ($type == 'dashboard') {
            $data['user'] = $user = $this->ionAuth->user()->row()->username;
        }
        $data = [
            'type' => $type,
            'view' => view($view, $data),
        ];
        return view('index', $data);
    }
}
