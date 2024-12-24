<?php
namespace App\Models;

use CodeIgniter\Model;

class ResepModel extends Model
{
    protected $table = 'resep';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_resep', 'foto_resep', 'catatan_resep','resep_makanan'];
    
}
