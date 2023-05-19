<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table      = 'mahasiswa';
  protected $primaryKey = 'id_mahasiswa';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id_mahasiswa', 'first_name', 'last_name', 'username', 'email', 'npm'];

  // Dates
  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';


  public function cekAda($id = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('mahasiswa');
    $builder->where('id_mahasiswa', $id);
    return $query = $builder->countAllResults();
  }
  public function countAllMahasiswa()
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mahasiswa");
    $data = $query->getNumRows();
    return $data;
  }
}
