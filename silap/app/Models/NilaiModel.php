<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
  protected $table      = 'nilai';
  protected $primaryKey = 'id';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['kode_mk', 'kode_pertemuan', 'npm', 'id_mahasiswa', 'id_laporan', 'huruf_mutu', 'nilai_angka', 'saran'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';


  public function cekNilai($kodemk, $koper, $idmhs)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM nilai WHERE kode_mk = '$kodemk' AND kode_pertemuan = $koper AND id_mahasiswa= $idmhs");
    $data = $query;
    // dd($kodemk . $koper . $idmhs);
    return $data;
  }
  public function getDataNilaiMhs($kodemk, $imas)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT n.kode_pertemuan, n.nilai_angka
    FROM nilai n WHERE kode_mk = '$kodemk' AND id_mahasiswa = $imas");
    $data = $query->getResultArray();
    return $data;
  }

  public function getNilaiSeluruh($kodemk, $imas)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT ROUND(AVG(nilai_angka),2) as nilai_rata_rata, 
    CASE
      WHEN AVG(nilai_angka) > 80 THEN 'A'
      WHEN AVG(nilai_angka) BETWEEN 66 AND 80 THEN 'B'
      WHEN AVG(nilai_angka) BETWEEN 51 AND 65 THEN 'C'
      WHEN AVG(nilai_angka) BETWEEN 40 AND 50 THEN 'D'
      ELSE 'E'
    END AS huruf_mutu
  FROM nilai
  WHERE kode_mk = '$kodemk' AND id_mahasiswa = $imas
  GROUP BY kode_mk;");
    $data = $query->getRowArray();
    return $data;
  }
}
