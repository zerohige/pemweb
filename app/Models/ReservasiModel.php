<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservasiModel extends Model
{
    protected $table = 'reservasi'; 
    protected $primaryKey = 'id'; 
    // Kolom-kolom yang diizinkan untuk diisi
    protected $allowedFields = [
        'user_id',
        'nama_dokter',
        'tanggal_konsultasi',
        'waktu_konsultasi',
        'catatan',
        'status',
        'dibuat_pada',
        'diperbarui_pada',
        'email',
        'nama',
    ];

    // Format waktu otomatis
    protected $useTimestamps = true;
    protected $createdField = 'dibuat_pada';
    protected $updatedField = 'diperbarui_pada';

    
}
