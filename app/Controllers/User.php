<?php

namespace App\Controllers;
namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\Controller;


class User extends Controller
{
    public function daftar()
    {
        $session = session();

        // Validasi input form
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('Daftar', ['validation' => $validation]);
        }

        // Proses simpan data ke database
        $userModel = new UserModel();
        $data = [
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $userModel->insert($data);
        $session->setFlashdata('success', 'User data saved successfully.');

        return redirect()->to(base_url('daftar'));
    }

    public function register()
    {
        $userModel = new UserModel();

        $input = $this->request->getJSON();

        if (!$input || !isset($input->nama_depan, $input->nama_belakang, $input->email, $input->password)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error','message'=>'invalid request']);
        }

        if ($userModel->where('email',$input->email)->first()){
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error','message' => 'email sudah ada']);
        }

        $userModel->save([
            'nama_depan' => $input->nama_depan,
            'nama_belakang' => $input->nama_belakang,
            'email' => $input->email,
            'password' => password_hash($input->password, PASSWORD_DEFAULT),
        ]);

        return $this->response->setStatusCode(201)->setJSON(['status' => 'success','message' => 'register berhasil']);
    }
}
