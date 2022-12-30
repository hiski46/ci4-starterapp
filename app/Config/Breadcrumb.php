<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Breadcrumb extends BaseConfig
{
    private $listUrl = [
        'auth' => 'Management User'
    ];

    public function __construct()
    {
        $this->listUrl;
    }
}
