<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('vlogin');
    }

    public function pendapatanBulanan()
    {
        return view('vPendapatanBulanan');
    }
    public function pendapatanHarian()
    {
        return view('vPendapatanHarian');
    }
    public function pengeluaranBulanan()
    {
        return view('vPengeluaranBulanan');
    }
    public function pengeluaranHarian()
    {
        return view('vPengeluaranHarian');
    }

}
