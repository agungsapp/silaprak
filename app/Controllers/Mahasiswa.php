<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\MataKuliahModel;
use \App\Models\KelasMahasiswaModel;
use \App\Models\DetailPertemuanModel;
use \App\Models\TugasModel;
use \App\Models\LaporanModel;


class Mahasiswa extends BaseController
{
  protected $userModel;
  protected $mkModel;
  protected $klsMhsModel;
  protected $detailPertemuanModel;
  protected $tugasModel;
  protected $laporanModel;

  public function __construct()
  {
    $this->userModel = new UsersModel();
    $this->mkModel = new MataKuliahModel();
    $this->klsMhsModel = new KelasMahasiswaModel();
    $this->detailPertemuanModel = new DetailPertemuanModel();
    $this->tugasModel = new TugasModel();
    $this->laporanModel = new LaporanModel();
  }

  public function index()
  {

    // echo "selamat datang mahasiswa !!!";
    $keyword = $this->request->getVar('cari_matkul');
    if ($keyword) {
      $hasil = $this->mkModel->pencarian($keyword);
    } else {
      $hasil = $this->mkModel->getKelasAll();
    }

    $data = [
      'title' => 'dashboard',
      'menu' => 'dashboard',
      'matkul' => $hasil
    ];
    // dd($data['matkul']);
    return view('mahasiswa/dashboard', $data);
  }

  public function myprofile()
  {

    $data['menu'] = 'myprofile';
    $data['title'] = 'My Profile';
    $data['dp'] = $this->userModel->getProfile(user_id());

    // $users = new \Myth\Auth\Models\UserModel();
    // $data['users'] = $users->findAll();
    return view('mahasiswa/myprofile', $data);
  }

  public function editProfile()
  {
    $data['menu'] = 'myprofile';
    $data['title'] = 'Edit Profile';
    $data['dp'] = $this->mkModel->getProfile(user_id());
    return view('mahasiswa/editProfile', $data);
  }

  public function updateProfile()
  {

    $this->userModel->save([
      'id' => $this->request->getVar('id'),
      'email' => $this->request->getVar('email'),
      'username' => $this->request->getVar('username'),
      'firstName' => $this->request->getVar('namadepan'),
      'lastName' => $this->request->getVar('namabelakang'),
      'npm' => $this->request->getVar('nip'),
    ]);

    session()->setFlashdata('pesan', 'Profile anda berhasil di edit !');

    return redirect()->to('/mahasiswa/myprofile');
  }

  public function kelasSaya()
  {
    $data['menu'] = 'daftarkelas';
    $data['title'] = 'kelas saya';
    // $data['matkul'] = $this->mkModel->where('id_dosen', user_id())->findAll();
    $data['matkul'] = $this->klsMhsModel->kelasSaya(user_id());
    // dd($data['matkul']);
    return view('mahasiswa/kelas_saya', $data);
  }

  // pencarian kelas 
  public function cariKelas()
  {
    // fungsi pencarian belum berjalan
    $kata = $this->request->getVar('cari_matkul');
    $data = [
      'title' => 'dashboard',
      'menu' => 'dashboard',
      'hasil' => $this->mkModel->pencarian($kata)
    ];
    return view('mahasiswa/dashboard', $data);
  }

  public function daftarkan()
  {
    $matkul = $this->request->getVar('matkul');
    $this->klsMhsModel->save([
      'kode_mk' => $this->request->getVar('kode_mk'),
      'id_dosen' => $this->request->getVar('id_dosen'),
      'id_mahasiswa' => user_id(),

    ]);
    session()->setFlashdata('pesan', "Berhasil daftar pada kelas $matkul !");


    return redirect()->to('/mahasiswa');
  }

  public function masukKelas($idkel, $kodemk)
  {
    $data = [
      'title' => 'masuk kelas',
      'menu' => 'daftarkelas',
      'kelas' => $this->klsMhsModel->getKelasMhs($idkel),
      'pertemuan' => $this->detailPertemuanModel->getDataPertemuanKelas($kodemk)
    ];

    // dd($data['pertemuan']);

    return view('mahasiswa/masuk_kelas', $data);
  }

  public function hapusKelasIkuti($idkel)
  {
    $delete = $this->klsMhsModel->delete($idkel);
    if ($delete) {
      session()->setFlashdata('pesan', 'Data kelas berhasil dihapus !');
      return redirect()->to('/mahasiswa/kelasSaya');
    }
  }

  public function download($id)
  {
    $file = $this->tugasModel->find($id);
    return $this->response->download('upload_instruksi/' . $file['file_instruksi'], null);
  }

  public function kerjakanLaporan($kodemk, $kodepertemuan, $kodetugas, $idkel)
  {
    // kodemk, kodepertemuan, kodetugas
    $data = [
      'title' => 'Kerjakan Laporan',
      'menu' => 'daftarkelas',
      'idkel' => $this->klsMhsModel->getKelasMhs($idkel),
      'kelas' => $this->detailPertemuanModel->getDataPertemuanLaporan($kodemk, $kodepertemuan),
      'ava' => $this->laporanModel->getLaporan($kodemk, $kodepertemuan, $kodetugas, user_id())
    ];

    return view('mahasiswa/kerjakan_laporan', $data);
  }

  public function uploadImages()
  {
    $file = $this->request->getFile('upload');
    echo "<script> alert('$file') </script>";
    $validated = $this->validate([
      'upload' => [
        // 'uploaded[upload]',
        // 'mime_in[upload,image/jpg/jpeg,image/png]',
        // 'max_size[upload,20480]'
        'rules' => 'mime_in[upload,image/png,image/jpeg,image/jpg,image/JPG,image/PNG]|max_size[upload,51200]'
      ]
    ]);

    if ($validated) {
      $file = $this->request->getFile('upload');

      $fileName = $file->getRandomName();
      $writePath = './laporan_images';
      $file->move($writePath, $fileName);
      $data = [
        'uploaded' => true,
        'url' => base_url('laporan_images/' . $fileName)
      ];
    } else {
      $data = [
        'uploaded' => false,
        'error' => [
          'messages' => $file
        ],
      ];
    }
    return $this->response->setJSON($data);
  }

  public function simpan()
  {
    $simpan =  $this->laporanModel->save([
      'id_mahasiswa' => $this->request->getVar('idmahasiswa'),
      'id_kelas' => $this->request->getVar('idkel'),
      'kode_mk' => $this->request->getVar('kodemk'),
      'kode_pertemuan' => $this->request->getVar('kodepertemuan'),
      'id_tugas' => $this->request->getVar('idtugas'),
      'isi_laporan' => $this->request->getVar('isilaporan')
    ]);

    while ($simpan) {
      session()->setFlashdata('pesan', "Berhasil mengumpulkan laporan pertemuan " . $this->request->getVar('kodepertemuan') . " !");
      return redirect()->to('/mahasiswa/masukKelas/' . $this->request->getVar('idkel') . '/' . $this->request->getVar('kodemk'));
    }
  }

  public function updateLaporan()
  {
    $this->laporanModel->save([
      'id_laporan' => $this->request->getVar('idlaporan'),
      'id_mahasiswa' => $this->request->getVar('idmahasiswa'),
      'id_kelas' => $this->request->getVar('idkel'),
      'kode_mk' => $this->request->getVar('kodemk'),
      'kode_pertemuan' => $this->request->getVar('kodepertemuan'),
      'id_tugas' => $this->request->getVar('idtugas'),
      'isi_laporan' => $this->request->getVar('isilaporan')
    ]);


    session()->setFlashdata('pesan', 'Data laporan berhasil di ubah !');
    return redirect()->to('/mahasiswa/masukKelas/' . $this->request->getVar('idkel') . '/' . $this->request->getVar('kodemk'));
  }

  public function laporanLengkap($kodemk, $userid)
  {
    $data = [
      'title' => 'Lihat Laporan Lengkap',
      'menu' => 'daftarkelas',
      'laporan' => $this->laporanModel->getAllLaporan($kodemk, $userid),
      'mhs' => $this->userModel->getProfile(user_id())
    ];

    return view('mahasiswa/laporan_lengkap', $data);
  }
}
