<?php

namespace App\Controllers;

class Home extends MainController
{

    public function index()
    {
        $data = ['title' => "Halaman Depan"];
        return $this->template('test', $data);
    }
}
