<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Semua extends BaseController
{
    public function index()
    {
        return view('home'); 
    }

    public function artikel()
    {
        return view('artikel');
    }

    public function artikelbaca()
    {
        return view('artikelbaca');
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function resep()
    {
        return view('resep');
    }

    public function konsultasi()
    {
        return view('konsultasi');
    }

    public function login()
    {
        return view('login');
    }
    public function dashboard_user(){
        if (!session()->get('logged_in')) {
            
            return redirect()->to(base_url('login'))->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('dashboard_user');
    }

    public function jadwal_konsultasi(){
        return view('jadwalkonsultasi');
    }

    public function dashboard_admin(){
        return view('dashboard_admin');
    }

    public function Test_resep(){
        return view('TestFormResep');
    }
    public function daftar_resep_adm(){
        return view('daftar-resep-admin');
    }
}