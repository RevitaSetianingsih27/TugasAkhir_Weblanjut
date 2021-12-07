<?php

namespace App\Controllers;

class Home extends BaseController
{
    
    public function index()
    {
        return view('index');
    }

    public function contact()
    {
        return view('vContact');
    }

    public function login()
    {
        return view('vlogin');
    }

    public function penjualanBulanan()
    {
        return view('vPenjualanBulanan');
    }
    
    public function penjualanHarian()
    {
        return view('vPenjualanHarian');
    }

    public function pengeluaranBulanan()
    {
        return view('vPengeluaranBulanan');
    }
    
    public function pengeluaranHarian()
    {
        return view('vPengeluaranHarian');
    }
    
    public function dataKaryawan()
    {
        return view('vDataKaryawan');
    }
    
    public function dataPengguna()
    {
        return view('vDataPengguna');
    }
    
    public function tDataJualHarian()
    {
        return view('vTambahDataPenjualanHarian');
    }
    
    public function tDataJualBulanan()
    {
        return view('vTambahDataPenjualanBulanan');
    }
    
    public function tDataKeluarHarian()
    {
        return view('vTambahDataPengeluaranHarian');
    }
    
    public function tDataKeluarBulanan()
    {
        return view('vTambahDataPengeluaranBulanan');
    }
    
    public function tDataKaryawan()
    {
        return view('vTambahDataKaryawan');
    }
    
    public function tDataPengguna()
    {
        return view('vTambahDataPengguna');
    }
    public function eDataJualHarian()
    {
        return view('vEditDataPenjualanHarian');
    }
    
    public function eDataJualBulanan()
    {
        return view('vEditDataPenjualanBulanan');
    }
    
    public function eDataKeluarHarian()
    {
        return view('vEditDataPengeluaranHarian');
    }
    
    public function eDataKeluarBulanan()
    {
        return view('vEditDataPengeluaranBulanan');
    }
    
    public function eDataKaryawan()
    {
        return view('vEditDataKaryawan');
    }
    
    public function eDataPengguna()
    {
        return view('vEditDataPengguna');
    }

}
