<?php

    namespace App\Controllers;

    class Home extends BaseController
    {
        public function index()
        {
            echo view('template/header');
            echo view('home_view');
            echo view('template/footer');
        }
    }
