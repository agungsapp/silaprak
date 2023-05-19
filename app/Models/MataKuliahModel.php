<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{

  protected $db;


  protected $table      = 'mata_kuliah';
  protected $primaryKey = 'kode_mk';

  protected $useAutoIncrement = false;

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['kode_mk', 'id_dosen', 'mata_kuliah', 'hari', 'sks', 'jam'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';


  // public function __construct()
  // {
  //   $this->db = \Config\Database::connect();
  //   $this->builder = $this->db->table($this->table);
  // }

  // public function __construct()
  // {
  //   parent::__construct();
  //   $this->db = \Config\Database::connect('sisprak');
  //   $this->builder = $this->db->table('NAME OF THE TABLE');
  // }



  // untuk generate kode mk
  public function generateKode()
  {
    $builder =  $this->table('mata_kuliah');
    // mengambil nilai maksimal dari database
    $builder->selectMax('kode_mk', 'kode_maks');
    $query =  $builder->get();
    // jika hasil query lebih dari 0
    if ($query->getNumRows() > 0) {
      foreach ($query->getResult() as $key) {
        // set tampungan 
        $kd = '';
        // pecah data / pisahkan dari TI- yang ada di database 4 digit dari belakang. 
        $ambildata = substr($key->kode_maks, -4);
        $increment = intval($ambildata) + 1;

        // masukan data kesini , masksud %04s adalah akan memasukan data sebanyak 4 digit ke kd
        $kd  = sprintf('%04s', $increment);
      }
    } else {
      $kd = '2001';
      return 'TI-' . $kd;
    }

    return 'TI-' . $kd;
  }

  public function gk()
  {
    $builder = $this->db->table('mata_kuliah');
    $builder->selectMax('kode_mk', 'kode_maks');
    $query =  $builder->get();

    if ($query->getNumRows() > 0) {
      foreach ($query->getResult() as $key) {
        $kd = '';
        if ($key->kode_maks !== null) {
          $ambildata = substr($key->kode_maks, -4);
          $increment = intval($ambildata) + 1;
          $kd  = sprintf('%04s', $increment);
        } else {
          $kd = '2001';
        }
      }
    } else {
      $kd = '2001';
    }

    return 'TI-' . $kd;
  }




  public function getKelas($kode)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mata_kuliah JOIN users ON mata_kuliah.id_dosen = users.id WHERE mata_kuliah.kode_mk = '$kode'");
    return $row   = $query->getRowArray();
  }

  public function getKelasAll($idmhs)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT mk.kode_mk, mk.mata_kuliah, mk.hari, mk.sks, mk.jam, mk.id_dosen,
    IF(km.id_kelas IS NOT NULL, 1, 0) AS status, 
    dosen.first_name, dosen.last_name
FROM mata_kuliah AS mk
LEFT JOIN kelas_mahasiswa AS km ON mk.kode_mk = km.kode_mk AND km.id_mahasiswa = $idmhs
LEFT JOIN dosen AS dosen ON mk.id_dosen = dosen.id_dosen;");
    return $query->getResultArray();
  }

  public function getJmlKelas($id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('mata_kuliah');
    $builder->where('id_dosen', $id);
    $builder->get();
    $query = $builder->countAllResults();
    return $query;
  }

  public function getProfile($id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('*');
    $builder->where('id', $id);
    $query = $builder->get()->getRowArray();
    return $query;
  }

  // pencarian kelas pada page mahasiswa
  public function pencarian($kunci, $imas)
  {
    $db = \Config\Database::connect();
    $query = $db->query(" SELECT mk.kode_mk, mk.mata_kuliah, mk.hari, mk.sks, mk.jam, mk.id_dosen,
           IF(km.id_kelas IS NOT NULL, 1, 0) AS status, 
           dosen.first_name, dosen.last_name
    FROM mata_kuliah AS mk
    LEFT JOIN kelas_mahasiswa AS km ON mk.kode_mk = km.kode_mk AND km.id_mahasiswa = $imas
    LEFT JOIN dosen AS dosen ON mk.id_dosen = dosen.id_dosen
    WHERE mk.mata_kuliah LIKE '%$kunci%'");
    return $query->getResultArray();
  }

  public function getDataNilai($idos)
  {

    $db = \Config\Database::connect();
    $query = $db->query("SELECT m.kode_mk, m.mata_kuliah, m.sks, m.hari, m.jam, COUNT(k.id_mahasiswa) AS jumlah_mahasiswa
    FROM mata_kuliah m
    LEFT JOIN kelas_mahasiswa k ON m.kode_mk = k.kode_mk
    WHERE m.id_dosen = $idos
    GROUP BY m.kode_mk, m.mata_kuliah, m.sks, m.hari, m.jam;");
    $data = $query->getResultArray();
    return $data;
  }

  public function getDataNilaiMhs($imas)
  {

    $db = \Config\Database::connect();
    $query = $db->query("SELECT m.kode_mk, m.mata_kuliah, m.sks, m.hari, m.jam
    FROM mata_kuliah m
    LEFT JOIN kelas_mahasiswa k ON m.kode_mk = k.kode_mk
    WHERE k.id_mahasiswa = $imas
    GROUP BY m.kode_mk, m.mata_kuliah, m.sks, m.hari, m.jam");
    $data = $query->getResultArray();
    return $data;
  }

  public function deleteMK($kodemk)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('mata_kuliah');
    $builder->where('kode_mk', $kodemk);
    $builder->delete();
  }

  public function countAllMatakuliah()
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mata_kuliah");
    $data = $query->getNumRows();
    return $data;
  }

  // admin area
  public function getAllKelas()
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mata_kuliah m
    JOIN dosen d ON m.id_dosen=d.id_dosen;");
    $data = $query->getResult();
    return $data;
  }
}
