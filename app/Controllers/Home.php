<?php

namespace App\Controllers;

class Home extends MainController
{

    public function index()
    {
        $data = ['title' => "Home"];
        return $this->template('dashboard/home', $data);
    }
}
