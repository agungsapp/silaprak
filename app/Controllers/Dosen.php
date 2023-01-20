<?php

namespace App\Controllers;
// untuk memanggil model
use \App\Models\MataKuliahModel;
use \App\Models\ProfileModel;
use \App\Models\DetailPertemuanModel;

class Dosen extends BaseController
{
    protected $mkModel;
    protected $profileModel;
    protected $detailPertemuanModel;

    public function __construct()
    {
        $this->mkModel = new MataKuliahModel();
        $this->profileModel = new ProfileModel();
        $this->detailPertemuanModel = new DetailPertemuanModel();
    }

    public function index()
    {

        $data['menu'] = 'dashboard';
        $data['title'] = 'dashboard';
        $db      = \Config\Database::connect();
        $query = $db->query('SELECT * FROM auth_groups_users WHERE group_id = 3');
        $kelas = $this->mkModel->getJmlKelas(user_id());
        $data['jumlah_mahasiswa'] = $query->getNumRows();
        $data['jumlah_kelas'] = $kelas;
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        return view('dosen/index', $data);
    }
    public function myprofile()
    {

        $data['menu'] = 'myprofile';
        $data['title'] = 'My Profile';
        $data['dp'] = $this->mkModel->getProfile(user_id());

        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();
        return view('dosen/myprofile', $data);
    }

    public function editProfile()
    {
        $data['menu'] = 'myprofile';
        $data['title'] = 'Edit Profile';
        $data['dp'] = $this->mkModel->getProfile(user_id());
        return view('dosen/editProfile', $data);
    }

    public function updateProfile()
    {

        // validasi
        // if (!$this->validate([
        //     ''
        // ])) {
        // }

        $this->profileModel->save([
            'id' => $this->request->getVar('id'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'firstName' => $this->request->getVar('namadepan'),
            'lastName' => $this->request->getVar('namabelakang'),
            'npm' => $this->request->getVar('nip'),
        ]);

        session()->setFlashdata('pesan', 'Profile anda berhasil di edit !');

        return redirect()->to('/dosen/myprofile');
    }

    public function daftarKelas()
    {
        $data['menu'] = 'daftarkelas';
        $data['title'] = 'daftar kelas';
        // $data['matkul'] = $this->mkModel->where('id_dosen', user_id())->findAll();
        $data['matkul'] = $this->mkModel->where('id_dosen', user_id())->findAll();

        return view('dosen/kelas', $data);
    }

    public function simpanKelas()
    {

        // validasi
        // if (!$this->validate([
        //     ''
        // ])) {
        // }

        $this->mkModel->save([
            'kode_mk' => $this->request->getVar('kodemk'),
            'id_dosen' => $this->request->getVar('iddosen'),
            'mata_kuliah' => $this->request->getVar('namamk'),
            'hari' => $this->request->getVar('hari'),
            'sks' => $this->request->getVar('sks'),
            'jam' => $this->request->getVar('jam')
        ]);

        session()->setFlashdata('pesan', 'Data kelas berhasil di tambahkan !');

        return redirect()->to('/dosen/daftarKelas');
    }

    // untuk generate kode mata kuliah
    public function kode()
    {
        // panggil function generate kode dari model, kemudian ubah menjadi json.
        return json_encode($this->mkModel->generateKode());
    }


    public function kelolaKelas($kode)
    {
        $dataKelas = $this->mkModel->getKelas($kode);
        $dataPertemuan = $this->detailPertemuanModel->getPertemuan($kode);
        $daftarPertemuan = $this->detailPertemuanModel->getPertemuanByMk($kode);
        // $dataKelas = $this->mkModel->where('kode_mk', $kode)->findAll(1);
        $data = [
            'title' => 'Kelola Kelas',
            'dk' => $dataKelas,
            'dp' => $dataPertemuan,
            'lp' => $daftarPertemuan,
            'menu' => 'daftarkelas'
        ];
        return view('dosen/kelola', $data);
    }

    public function simpanPertemuanBaru()
    {
        $this->detailPertemuanModel->save([
            'kode_mk' => $this->request->getVar('kode_mk'),
            'kode_dosen' => $this->request->getVar('kode_dosen'),
            'kode_pertemuan' => $this->request->getVar('kode_pertemuan'),
        ]);

        session()->setFlashdata('pesan', 'Data pertemuan berhasil di tambahkan !');

        $kodenya = $this->request->getVar('kode_mk');

        return redirect()->to("/dosen/kelolaKelas/$kodenya");
    }

    public function detailPertemuan($id)
    {
        $pertemuan = $this->detailPertemuanModel->getPertemuanByID($id);
        $data = [
            'title' => 'Kelola Pertemuan',
            'pertemuan' => $pertemuan,
            'menu' => 'daftarkelas'
        ];
        return view('dosen/kelola_pertemuan', $data);
    }

    public function dataNilai()
    {
        $data = [
            'title' => 'Data Nilai',
            'matkul' => $this->mkModel->where('id_dosen', user_id())->findAll(),
            'menu' => 'daftarkelas'
        ];
        return view('dosen/data_nilai', $data);
    }

    public function coba()
    {
        dd($this->request->getVar());
    }
}
