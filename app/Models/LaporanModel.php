<?php

namespace App\Models;

use CodeIgniter\Model;


class LaporanModel extends Model
{
  protected $table      = 'laporan';
  protected $primaryKey = 'id_laporan';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id_mahasiswa', 'id_kelas', 'kode_mk', 'kode_pertemuan', 'id_tugas', 'isi_laporan'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function getLaporan($kodemk, $kodepertemuan, $kodetugas)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM laporan WHERE kode_mk = '$kodemk' AND kode_pertemuan = $kodepertemuan AND id_tugas = $kodetugas");
    $data = $query->getRowArray();
    return $data;
  }
  public function getSudahDikerjakan($idkel, $kodemk, $userid)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM laporan WHERE id_kelas = $idkel AND kode_mk = '$kodemk' AND id_mahasiswa = $userid");
    $data = $query->getRowArray();
    return $data;
  }

  public function getAllLaporan($kodemk, $userid)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM laporan WHERE kode_mk = '$kodemk' AND id_mahasiswa = $userid");
    $data = $query->getResultArray();
    return $data;
  }
}
