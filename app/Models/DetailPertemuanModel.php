<?php

namespace App\Models;

use CodeIgniter\Model;

use function PHPUnit\Framework\isNull;

class DetailPertemuanModel extends Model
{



  protected $table      = 'detail_pertemuan';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['kode_mk', 'kode_dosen', 'kode_pertemuan', 'kode_tugas'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';


  // untuk generate pertemuan
  public function getPertemuan($kode)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT MAX(kode_pertemuan) as kodemax FROM detail_pertemuan WHERE kode_mk = '$kode'");
    if (isNull($query->getNumRows())) {
      foreach ($query->getRow() as $k) {
        $kp = '';
        $getdata = $k;
        $increment = $getdata + 1;
        $kp = $increment;
      }
    } else {
      $kp = 1;
    }
    return $kp;
  }

  public function getPertemuanByMk($kode)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM detail_pertemuan WHERE kode_mk = '$kode'");
    $pertemuan = $query->getResultArray();
    return $pertemuan;
  }

  public function getPertemuanTugas($kode_mk)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT DISTINCT t.id_pertemuan, t.kode_mk, t.judul, t.deskripsi, t.file_instruksi, t.id_tugas FROM detail_pertemuan d
    JOIN tugas t ON d.kode_pertemuan = t.id_pertemuan
    WHERE t.kode_mk = '$kode_mk'");
    $pertemuan = $query->getResultArray();
    return $pertemuan;
  }



  public function getPertemuanByID($id)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT u.firstName, u.lastName, d.id, d.kode_mk, d.kode_dosen, d.kode_pertemuan, d.kode_tugas, m.mata_kuliah, m.hari, m.jam 
    FROM detail_pertemuan d
    JOIN users u ON u.id = d.kode_dosen
    JOIN mata_kuliah m ON m.kode_mk = d.kode_mk
    WHERE d.id = '$id'");
    // $query = $db->query("SELECT * FROM detail_pertemuan WHERE id = '$id'");
    $pertemuan = $query->getRowArray();
    return $pertemuan;
  }

  public function updateKodePertemuan($idtugas, $kode_mk, $idpertemuan)
  {
    $db = \Config\Database::connect();
    $db->query("UPDATE detail_pertemuan SET kode_tugas=$idtugas WHERE kode_mk= '$kode_mk' AND kode_pertemuan = $idpertemuan");
  }
}
