<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ReservasiModel;
use App\Models\Admin;

class UserController extends BaseController
{   
    public function register()
    {
        $userModel = new UserModel();

        // Periksa data yang dikir
        $contentType = $this->request->getHeaderLine('Content-Type');
        if (str_contains($contentType, 'application/json')) {
            $input = $this->request->getJSON(true); // Untuk Data yang dikirim dalam bentuk JSON
        } else {
            $input = $this->request->getPost(); //Untuk Data Yang dikirm dalam bentuk form
        }

        if (!$input || !isset($input['nama_depan'], $input['nama_belakang'], $input['email'], $input['password'])) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Invalid input']);
        }


        if ($userModel->where('email', $input['email'])->first()) {
            return redirect()->to(base_url('/daftar'))->with('error', 'Akun Sudah Terdaftar');
        }


        $userModel->save([
            'nama_depan' => $input['nama_depan'],
            'nama_belakang' => $input['nama_belakang'],
            'email' => $input['email'],
            'password' => password_hash($input['password'], PASSWORD_BCRYPT),
        ]);

        return redirect()->to(base_url('/daftar'))->with('success', 'Pendaftaran akun berhasil');
    }

    public function loginuser()
    {
        $userModel = new UserModel();
        $Admin = new Admin();
        $contentType = $this->request->getHeaderLine('Content-Type');
        if (str_contains($contentType, 'application/json')) {
            $input = $this->request->getJSON(true); // Untuk Data yang dikirim dalam bentuk JSON
        } else {
            $input = $this->request->getPost(); //Untuk Data Yang dikirm dalam bentuk form
        }
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'email diperlukan',
                    'valid_email' => 'email tidak valid'
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password diperlukan',
                ],
            ],
        ])) {
            return $this->response->setStatusCode(400)->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $email = $input['email'] ?? null; // Retrieve email from JSON
        $password = $input['password'] ?? null;

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'invalid email',
            ]);
        }

        if (!password_verify($password, $user['password'])) {
            return $this->response->setStatusCode(401)->setJSON([
                'status' => 'error',
                'message' => 'Invalid password.',
            ]);
        }

        session()->set([
            'user_id' => $user['id'],
            'nama_depan' => $user['nama_depan'],
            'nama_belakang' => $user['nama_belakang'],
            'email' => $user['email'],
            'logged_in' => true,
        ]);

        return redirect()->to(base_url('user/dashboard_user'))->with('sucess','login berhasil');
    }
    
    public function logout(){
        session()->start();
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function PesanReservasi()
{
    $reservasiModel = new ReservasiModel();
    $user_id = session()->get('user_id');
    $email = session()->get('email');
    $nama = session()->get('nama_depan');
    // Ambil input data dari request
    $contentType = $this->request->getHeaderLine('Content-Type');
    if (str_contains($contentType, 'application/json')) {
        $input = $this->request->getJSON(true); // JSON input
    } else {
        $input = $this->request->getPost(); // Form input
    }

    // Validasi data
    if (!$this->validate([
        'nama_dokter' => 'required|max_length[100]',
        'catatan' => 'permit_empty|max_length[1000]',
    ])) {
        return $this->response->setStatusCode(400)->setJSON([
            'status' => 'error',
            'errors' => $this->validator->getErrors(),
        ]);
    }

    // Data yang akan disimpan
    $data = [
        'user_id' => $user_id,
        'email' =>$email,
        'nama' =>$nama,
        'nama_dokter' => $input['nama_dokter'],
        'tanggal_konsultasi' => $input['tanggal_konsultasi'],
        'waktu_konsultasi' => $input['waktu_konsultasi'],
        'catatan' => $input['catatan'] ?? null,
        'status' => 0, // Default Pending
    ];

    // Simpan data ke database
    try {
        $reservasiModel->insert($data);
        return $this->response->setStatusCode(201)->setJSON([
            'status' => 'success',
            'message' => 'Reservasi berhasil dibuat',
            'data' => $data,
        ]);
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat membuat reservasi.',
            'error_detail' => $e->getMessage(),
        ]);
    }
}

public function getAllReservasi()
{
    $reservasiModel = new ReservasiModel();
    try {
        $data = $reservasiModel->findAll();
        return $this->response->setStatusCode(200)->setJSON($data);
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'message' => 'Gagal mengambil data reservasi.',
            'error_detail' => $e->getMessage(),
        ]);
    }
}
public function getReservasiByUser()
{
    $reservasiModel = new ReservasiModel();

    // Ambil user_id dari session
    $user_id = session()->get('user_id');
    if (!$user_id) {
        return $this->response->setStatusCode(401)->setJSON([
            'status' => 'error',
            'message' => 'Anda harus login untuk melihat data ini.'
        ]);
    }

    try {
        // Ambil data reservasi berdasarkan user_id
        $data = $reservasiModel->where('user_id', $user_id)->findAll();

        return $this->response->setStatusCode(200)->setJSON($data);
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'message' => 'Data Belum Ada atau tidak ditemukan.',
            'error_detail' => $e->getMessage()
        ]);
    }
}

public function deleteReservasi($id)
{
    $reservasiModel = new ReservasiModel(); // Pastikan model sudah dibuat

    try {
        // Periksa apakah data dengan ID yang diberikan ada
        $reservasi = $reservasiModel->find($id);
        if (!$reservasi) {
            return $this->response->setStatusCode(404)->setJSON([
                'status' => 'error',
                'message' => 'Reservasi tidak ditemukan.'
            ]);
        }

        // Hapus data
        $reservasiModel->delete($id);

        return $this->response->setStatusCode(200)->setJSON([
            'status' => 'success',
            'message' => 'Reservasi berhasil dihapus.'
        ]);
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500)->setJSON([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat menghapus reservasi.',
            'error_detail' => $e->getMessage()
        ]);
    }
}


}
