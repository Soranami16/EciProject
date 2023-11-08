<?php

namespace App\Controllers;

class Form_fasilitas extends BaseController
{
    public function index()
    {
        $header = array(
            "title"=>"Form Fasilitas It"
        );
        echo view('template/header', $header);
        echo view('tiket/form_fasilitas_it');
        echo view('template/footer');
    }

}


