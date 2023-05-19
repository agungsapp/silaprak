<?php

namespace App\Models;

use CodeIgniter\Model;

class JamModel extends Model
{
  protected $table      = 'jam_kuliah';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['jam1', 'jam2'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';
}
