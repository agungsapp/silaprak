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

  public function getKelas($kode)
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mata_kuliah JOIN users ON mata_kuliah.id_dosen = users.id WHERE mata_kuliah.kode_mk = '$kode'");
    return $row   = $query->getRowArray();
  }

  public function getKelasAll()
  {
    $db = \Config\Database::connect();
    $query = $db->query("SELECT * FROM mata_kuliah JOIN users ON mata_kuliah.id_dosen = users.id ");
    return $query->getResultArray();
  }

  public function getJmlKelas($id)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('mata_kuliah');
    $builder->where('id_dosen', $id);
    $query = $builder->get()->getNumRows();
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
  public function pencarian($kunci)
  {
    $db = \Config\Database::connect();
    $builder = $db->table('mata_kuliah');
    $builder->select('*');
    $builder->join('users', 'mata_kuliah.id_dosen = users.id');
    $builder->like('mata_kuliah', $kunci);
    $query = $builder->get()->getResultArray();
    return $query;
  }
}
