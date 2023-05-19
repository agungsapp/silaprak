<?php

namespace App\Controllers;


use PhpParser\Node\Stmt\Echo_;
use \App\models\MataKuliahModel;
use \App\models\DosenModel;
use \App\models\MahasiswaModel;
use \App\models\JamModel;
use \App\models\KodeModel;
use \App\models\NilaiModel;
use \App\models\LaporanModel;
use \App\models\UsersModel;


class Admin extends BaseController
{

  protected $dosenModel, $mhsModel, $matkulModel, $jamModel, $kodeModel, $nilaiModel, $laporanModel, $userModel;

  public function __construct()
  {
    $this->dosenModel = new DosenModel();
    $this->mhsModel = new MahasiswaModel();
    $this->matkulModel = new MataKuliahModel();
    $this->jamModel = new JamModel();
    $this->kodeModel = new KodeModel();
    $this->nilaiModel = new NilaiModel();
    $this->laporanModel = new LaporanModel();
    $this->userModel = new UsersModel();
  }


  public function index()
  {

    $data = [
      'title' => 'dashboard admin',
      'menu' => 'dashboard',
      'submenu' => '',
      'dosen' => $this->dosenModel->countAllDosen(),
      'mahasiswa' => $this->mhsModel->countAllMahasiswa(),
      'matakuliah' => $this->matkulModel->countAllMatakuliah(),
    ];
    return view('admin/dashboard', $data);
  }

  public function dataDosen()
  {
    $data = [
      'title' => 'Data Dosen',
      'menu' => 'data',
      'submenu' => 'dosen',
      'dosen' => $this->dosenModel->findAll()
    ];
    return view('admin/data_dosen', $data);
  }

  public function dataMahasiswa()
  {
    $data = [
      'title' => 'Data Mahasiswa',
      'menu' => 'data',
      'submenu' => 'mahasiswa',
      'mahasiswa' => $this->mhsModel->findAll()
    ];
    return view('admin/data_mahasiswa', $data);
  }

  public function dataMatakuliah()
  {
    $data = [
      'title' => 'Data Matakuliah',
      'menu' => 'data',
      'submenu' => 'matakuliah',
      'matakuliah' => $this->matkulModel->findAll()
    ];
    return view('admin/data_matakuliah', $data);
  }

  public function settings()
  {
    $data = [
      'title' => 'Settings',
      'menu' => 'settings',
      'submenu' => '',
      'validation' => \Config\Services::validation(),
      'time' => $this->jamModel->findAll()
    ];
    return view('admin/settings', $data);
  }

  public function simpanWaktu()
  {

    if (!$this->validate([
      'jam1' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'jam awal tidak boleh kosong !'
        ]
      ],
      'jam2' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'jam akhir tidak boleh kosong !'
        ]
      ]
    ])) {

      return redirect()->to("admin/settings")->withInput();
    }

    $this->jamModel->save([
      'jam1' => $this->request->getVar('jam1'),
      'jam2' => $this->request->getVar('jam2')
    ]);


    session()->setFlashdata('pesan', 'Data jam kuliah berhasil di tambahkan !');
    return redirect()->to($_SERVER['HTTP_REFERER']);
  }

  public function updateJam()
  {
    $this->jamModel->save([
      'id' => $this->request->getVar('id'),
      'jam1' => $this->request->getVar('jam1'),
      'jam2' => $this->request->getVar('jam2')
    ]);


    session()->setFlashdata('pesan', 'Data jam kuliah berhasil di update !');
    return redirect()->to($_SERVER['HTTP_REFERER']);
  }

  public function deleteJam($id)
  {
    $this->jamModel->delete(['id' => $id]);
    session()->setFlashdata('pesan', 'Data jam kuliah berhasil di hapus !');
    return redirect()->to($_SERVER['HTTP_REFERER']);
  }

  public function dataNilai()
  {
    $data = [
      'title' => 'Data Kelas',
      'menu' => 'nilai',
      'submenu' => '',
      'data' => $this->matkulModel->getAllKelas()

    ];
    return view('admin/data_nilai', $data);
  }

  public function details($kodemk)
  {
    $data = [
      'title' => 'Details',
      'menu' => 'nilai',
      'submenu' => '',
      'data' => $this->nilaiModel->getAllNilaiByMK($kodemk)

    ];
    return view('admin/details', $data);
  }
  public function detail($kodemk, $imas)
  {
    $data = [
      'title' => 'Detail',
      'menu' => 'nilai',
      'submenu' => '',
      'data' => $this->nilaiModel->getDetailNilaiByMkAndID($kodemk, $imas)

    ];
    return view('admin/detail', $data);
  }

  public function lihatLaporan($kodemk, $kodepertemuan, $imas)
  {
    $ceknilai = $this->nilaiModel->cekNilai($kodemk, $kodepertemuan, $imas);
    $cek = $ceknilai->getNumRows();
    $hasilnya = null;
    if ($cek > 0) {
      $hasilnya = $ceknilai->getRowArray();
    } else {
      $hasilnya = 0;
    }


    $data = [
      'title' => 'Lihat Laporan',
      'menu' => 'nilai',
      'submenu' => '',
      'dlp' => $this->laporanModel->getLaporanPerpertemuan($kodemk, $kodepertemuan, $imas),
      'mhs' => $this->userModel->getProfile($imas),
      'cn' => $hasilnya
    ];
    return view('admin/lihat_laporan', $data);
  }
}
