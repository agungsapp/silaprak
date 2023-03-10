<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasMahasiswaModel extends Model
{
  protected $table      = 'kelas_mahasiswa';
  protected $primaryKey = 'id_kelas';

  protected $useAutoIncrement = true;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['kode_mk', 'id_dosen', 'id_mahasiswa'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  public function kelasSaya($id = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('kelas_mahasiswa');
    $builder->select('mata_kuliah.kode_mk, mata_kuliah.mata_kuliah, mata_kuliah.hari, mata_kuliah.sks, mata_kuliah.jam, dosen.first_name, dosen.last_name, kelas_mahasiswa.id_kelas');
    $builder->join('mata_kuliah', 'mata_kuliah.kode_mk = kelas_mahasiswa.kode_mk');
    $builder->join('dosen', 'dosen.id_dosen = kelas_mahasiswa.id_dosen');
    $builder->where('id_mahasiswa', $id);
    return $query = $builder->get()->getResultArray();
  }

  public function getKelasMhs($idkel = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('kelas_mahasiswa');
    $builder->select('mata_kuliah.kode_mk, mata_kuliah.mata_kuliah, mata_kuliah.hari, mata_kuliah.sks, mata_kuliah.jam, dosen.first_name, dosen.last_name, kelas_mahasiswa.id_kelas');
    $builder->join('mata_kuliah', 'mata_kuliah.kode_mk = kelas_mahasiswa.kode_mk');
    $builder->join('dosen', 'dosen.id_dosen = kelas_mahasiswa.id_dosen');
    $builder->where('id_kelas', $idkel);
    return $query = $builder->get()->getRowArray();
  }

  public function daftarkan($kode_mk, $id_dosen, $id_mahasiswa)
  {
  }

  public function getDataMhsDosen($kodemk)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM kelas_mahasiswa JOIN mahasiswa ON kelas_mahasiswa.id_mahasiswa = mahasiswa.id_mahasiswa WHERE kelas_mahasiswa.kode_mk = '$kodemk'");
    $data = $query->getResultArray();
    return $data;
  }

  public function getKelasAndCheck($idos)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT 
  mk.kode_mk,
  mk.mata_kuliah,
  mk.hari,
  mk.sks,
  mk.jam,
  COUNT(km.id_mahasiswa) AS jumlah_mahasiswa,
  CASE 
    WHEN COUNT(km.id_mahasiswa) = 0 THEN 'Kosong'
    ELSE CONCAT(COUNT(km.id_mahasiswa), ' Mahasiswa')
  END AS status
FROM mata_kuliah mk
LEFT JOIN kelas_mahasiswa km ON mk.kode_mk = km.kode_mk
WHERE mk.id_dosen = $idos
GROUP BY mk.kode_mk, mk.mata_kuliah, mk.hari, mk.sks, mk.jam;");
    $data = $query->getResultArray();
    return $data;
  }
}
