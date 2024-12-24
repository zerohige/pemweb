<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\ReservasiModel;

class AdminController extends BaseController
{
    public function regis_admin()
    {
        $Admin = new Admin();
        $input = $this->request->getJSON(true);

        if (!$input || !isset($input['username'], $input['password'], $input['email'])) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'message' => 'invalid input',
            ]);
        }

        $Admin->save([
            'username' => $input['username'],
            'password' => password_hash($input['password'], PASSWORD_DEFAULT),
            'email' => $input['email'],
        ]);

        return $this->response->setStatusCode(200)->setJSON([
            'status' => 'success',
            'message' => 'admin berhasil terdaftar',
        ]);
    }
    public function loginadmin()
    {
        $adminModel = new Admin();

        $input = $this->request->getPost();
        $email = $input['email'] ?? null;
        $password = $input['password'] ?? null;

        $admin = $adminModel->where('email', $email)->first();

        if (!$admin || !password_verify($password, $admin['password'])) {
            return redirect()->back()->with('error', 'Email atau password salah.');
        }

        session()->set([
            'admin_id' => $admin['id'],
            'admin_name' => $admin['username'], // Sesuaikan dengan kolom tabel admin
            'email' => $admin['email'],
            'is_admin' => true,
            'logged_in' => true,
        ]);

        return redirect()->to(base_url('/admin/dashboard'))->with('success', 'Login admin berhasil.');
    }
    public function accReservation($id)
    {
        $reservationModel = new ReservasiModel();
        $reservationModel->update($id,['status'=> 1]);

        return $this->response->setJSON([
            'message' => 'Reservasi di approve',
            'status' => 1,
            'success' => true
        ]);
    }
    public function doneReservation($id)
    {
        $reservationModel = new ReservasiModel();
        $reservationModel->update($id,['status'=> 2]);

        return $this->response->setJSON([
            'message' => 'Reservasi ditandai selesai',
            'status' => 2,
            'success' => true
        ]);
    }
}
