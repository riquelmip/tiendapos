<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        
        $datos['titulo'] = 'Inicio - TiendaPOS';
        $datos['titulo_card'] = 'Inicio';
        echo view('template/header', $datos);
        echo view('tables', $datos);
        echo view('template/footer', $datos);
    }
}
