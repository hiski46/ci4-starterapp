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
        if ($this->ionAuth->loggedIn()) {
            //create session data
            $sessionData = (array)$this->ionAuth->user()->row();
            unset($sessionData['password'], $sessionData['user_id']);
            $this->session->set($sessionData);
        }
    }

    /** Memanggil template 
     * @param string $view url view dari "App/View"
     * @param array $data data yang dimasukkan dalam view
     * @param string $type jika "dashboard" maka akan ditampilkan dengan template dashboard(navbar,dll) jika "login" akan ditampilkan dengan template login
     */
    public function template($view, $data, $type = 'dashboard')
    {
        $data = [
            'type' => $type,
            'view' => view($view, $data),
        ];
        return view('index', $data);
    }

    /** Modal Bootstrap 
     * memanggil modal
     * 
     * @param string $isi isi modal, akan diletakkan pada body modal
     * @param string $title judul modal
     * @param bool $staticbackdrop true untuk mengaktifkan static backdrop hanya bisa di-close dengan tombol close. apabila false modal akan tertutup apabila klik dimana saja
     * @param bool $scroll jika true modal bisa discroll apabila isi konten sudah lebih dari tinggi layar
     * @param bool $center jika true letak modal ditengah layar
     * @param string $size null/sm/lg/xl/fullscreen. jika null size medium
     */
    function modal($isi = null, $title = '', $staticbackdrop = true, $scroll = true, $center = false, $size = null)
    {
        if ($staticbackdrop) {
            $staticbackdrop = 'data-bs-backdrop="static"';
        }
        if ($scroll) {
            $scroll = 'modal-dialog-scrollable ';
        }
        if ($center) {
            $center = 'modal-dialog-centered ';
        }
        if ($size) {
            $size = 'modal-' . $size . ' ';
        }
        $html = '<div class="modal fade " ' . $staticbackdrop . ' id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ' . $scroll . $center . $size . '">
        <div class="modal-content rounded-0">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">' . $title . '</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">' .
            $isi
            . '</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>';

        return $html;
    }
}
