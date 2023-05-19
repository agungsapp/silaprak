<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
  protected $table      = 'users';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id', 'email', 'username', 'firstName', 'lastName', 'npm', 'userImage'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function getProfile($id = null)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM users WHERE id ='$id'");
    return $row   = $query->getRowArray();
  }
}
