<?php

namespace App\Models;

use CodeIgniter\Model;


class DosenModel extends Model
{
  protected $table      = 'dosen';
  protected $primaryKey = 'id_dosen';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id_dosen', 'first_name', 'last_name', 'username', 'email', 'nip'];

  // Dates
  protected $useTimestamps = false;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';


  public function cekAda($id = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('dosen');
    $builder->where('id_dosen', $id);
    return $query = $builder->countAllResults();
  }
}
