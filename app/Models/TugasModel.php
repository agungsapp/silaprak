<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class TugasModel extends Model
{



  protected $table      = 'tugas';
  protected $primaryKey = 'id_tugas';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id_tugas', 'kode_mk', 'id_pertemuan', 'judul', 'deskripsi', 'deadline', 'file_instruksi'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function generateIDTugas()
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT MAX(id_tugas) as kodemax FROM tugas");
    if (isNull($query->getNumRows())) {
      foreach ($query->getRow() as $k) {
        $it = '';
        $getdata = $k;
        $increment = $getdata + 1;
        $it = $increment;
      }
    } else {
      $it = 1;
    }
    return $it;
  }
  public function cekTugas($kodemk, $kodepertemuan)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM tugas WHERE kode_mk = '$kodemk' AND id_pertemuan = $kodepertemuan");
    return $query;
  }
}
