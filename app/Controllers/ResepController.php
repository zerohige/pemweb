<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResepModel;

class ResepController extends BaseController
{
    protected $resepModel;

    public function __construct()
    {
        $this->resepModel = new ResepModel();
    }

    // API: Add a new recipe
    public function create()
    {
        $validation = \Config\Services::validation();

        // Validasi data input
        $rules = [
            'nama_resep' => 'required|string|max_length[255]',
            'catatan_resep' => 'required|string',
            'resep_makanan' => 'string',
            'foto_resep' => 'uploaded[foto_resep]|is_image[foto_resep]|max_size[foto_resep,5120]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ])->setStatusCode(400);
        }

        // Proses file upload
        $file = $this->request->getFile('foto_resep');
        $newName = $file->getRandomName();
        $file->move('uploads', $newName);

        // Simpan data ke database
        $this->resepModel->save([
            'nama_resep' => $this->request->getPost('nama_resep'),
            'catatan_resep' => $this->request->getPost('catatan_resep'),
            'resep_makanan' => $this->request->getPost('resep_makanan'),
            'foto_resep' => 'uploads/' . $newName,
        ]);

        // Kirimkan respons sukses
        return redirect()->to(base_url('/testi'))->with('success', 'Resep berhasil dibuat');
    }

    public function form($id = null)
    {
        $resep = null;

        // Jika ada ID, ambil data resep untuk mode edit
        if ($id) {
            $resep = $this->resepModel->find($id);
        }

        return view('form_resep', ['resep' => $resep]);
    }

    public function list()
    {
        // Ambil semua data resep dari database
        $reseps = $this->resepModel->findAll();

        // Kirim data ke view
        return view('Resep', ['reseps' => $reseps]);
    }

    public function list_admin()
    {
        $reseps = $this->resepModel->findAll();
        return view('daftar-resep-admin', ['reseps' => $reseps]);
    }

    public function delete($id)
    {
        if ($this->resepModel->delete($id)) {
            return $this->response->setJSON(['message' => 'Resep berhasil dihapus.']);
        }
        return $this->response->setJSON(['error' => 'Gagal menghapus resep.'], 500);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        // Validasi Input
        $rules = [
            'nama_resep' => 'required|string|max_length[255]',
            'catatan_resep' => 'required|string',
            'resep_makanan' => 'required|string',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON(['error' => $this->validator->getErrors()]);
        }

        // Update Foto Jika Diupload
        if ($file = $this->request->getFile('foto_resep')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/resep', $newName);
                $data['foto_resep'] = 'uploads/resep/' . $newName;
            }
        }

        // Update Data di Database
        if ($this->resepModel->update($id, $data)) {
            return redirect()->to(base_url('/admin/daftar-resep'))->with('success','Berhasil mengubah resep');
        }

        return redirect()->to(base_url('/admin/daftar-resep'))->with('error','gagal memperbarui data');
    }
}
