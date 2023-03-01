<?php

namespace App\Controllers;
// untuk memanggil model
use \App\Models\MataKuliahModel;
use \App\Models\ProfileModel;
use \App\Models\DetailPertemuanModel;
use \App\Models\TugasModel;
use \App\Models\KelasMahasiswaModel;
use \App\Models\LaporanModel;
use \App\Models\UsersModel;
use \App\Models\NilaiModel;

use function PHPUnit\Framework\isNull;

class Dosen extends BaseController
{
    protected $mkModel;
    protected $profileModel;
    protected $detailPertemuanModel;
    protected $tugasModel;
    protected $kelasMhs;
    protected $laporanModel;
    protected $userModel;
    protected $nilaiModel;

    public function __construct()
    {
        $this->mkModel = new MataKuliahModel();
        $this->profileModel = new ProfileModel();
        $this->detailPertemuanModel = new DetailPertemuanModel();
        $this->tugasModel = new TugasModel();
        $this->kelasMhs = new KelasMahasiswaModel();
        $this->laporanModel = new LaporanModel();
        $this->userModel = new UsersModel();
        $this->nilaiModel = new NilaiModel();
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
    // kelas
    public function daftarKelas()
    {
        $data['menu'] = 'daftarkelas';
        $data['title'] = 'daftar kelas';
        // $data['matkul'] = $this->mkModel->where('id_dosen', user_id())->findAll();
        // $data['matkul'] = $this->mkModel->where('id_dosen', user_id())->findAll();
        $data['matkul'] = $this->kelasMhs->getKelasAndCheck(user_id());

        return view('dosen/kelas', $data);
    }

    public function simpanKelas()
    {

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

    public function deleteKelas($kodemk)
    {
        $this->mkModel->deleteMK($kodemk);
        session()->setFlashdata('pesan', 'Data kelas berhasil di hapus !');
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function updateKelas()
    {
        $this->mkModel->save([
            'kode_mk' => $this->request->getVar('kodemk'),
            'id_dosen' => $this->request->getVar('iddosen'),
            'mata_kuliah' => $this->request->getVar('namamk'),
            'hari' => $this->request->getVar('hari'),
            'sks' => $this->request->getVar('sks'),
            'jam' => $this->request->getVar('jam')
        ]);

        session()->setFlashdata('pesan', 'Data kelas berhasil di update !');

        return redirect()->to('/dosen/daftarKelas');
    }

    // untuk generate kode mata kuliah
    public function kode()
    {
        // panggil function generate kode dari model, kemudian ubah menjadi json.

        return json_encode($this->mkModel->gk());
    }
    public function idtugas()
    {
        // panggil function generate kode dari model, kemudian ubah menjadi json.
        return json_encode($this->tugasModel->generateIDTugas());
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

    public function detailPertemuan($id, $kodemk, $kodepertemuan)
    {
        // session();
        $id_tugas = $this->tugasModel->generateIDTugas();
        $pertemuan = $this->detailPertemuanModel->getPertemuanByID($id);
        $tugas = $this->tugasModel->cekTugas($kodemk, $kodepertemuan);
        $data = [
            'title' => 'Kelola Pertemuan',
            'validation' => \Config\Services::validation(),
            'pertemuan' => $pertemuan,
            'menu' => 'daftarkelas',
            'idtugas' => $id_tugas,
            'datatugas' => $tugas
        ];
        return view('dosen/kelola_pertemuan', $data);
    }
    // kelas end
    // nilai 
    public function dataNilai()
    {
        $data = [
            'title' => 'Data Nilai',
            'matkul' => $this->mkModel->getDataNilai(user_id()),
            'menu' => 'daftarnilai'
        ];
        return view('dosen/data_nilai', $data);
    }

    public function daftarNilaiMahasiswa($kodemk)
    {
        $data['menu'] = 'daftarnilai';
        $data['title'] = 'Daftar Nilai';
        $data['dk'] = $this->mkModel->getKelas($kodemk);
        $data['dm'] = $this->kelasMhs->getDataMhsDosen($kodemk); //data mahasiswa (dm)

        return view('dosen/daftar_nilai_mahasiswa', $data);
    }

    public function detailNilai($kodemk, $idmhs)
    {
        $data['menu'] = 'daftarnilai';
        $data['title'] = 'pratinjau laporan mahasiswa';
        $data['dpm'] = $this->detailPertemuanModel->getPertemuanMahasiswaNilaiV($kodemk, $idmhs); //dpm daftar pertemuan mahasiswa baik laporan null dan tidak null

        // dd($data['dpm']);
        return view('dosen/detail_nilai_pertemuan_mahasiswa', $data);
    }

    public function lihatLaporanUntukPenilaian($kodemk, $kodepertemuan, $idmhs)
    {
        $ceknilai = $this->nilaiModel->cekNilai($kodemk, $kodepertemuan, $idmhs);
        $cek = $ceknilai->getNumRows();
        $hasilnya = null;
        if ($cek > 0) {
            $hasilnya = $ceknilai->getRowArray();
        } else {
            $hasilnya = 0;
        }

        // dd($hasilnya);



        $data['menu'] = 'daftarnilai';
        $data['title'] = 'penilaian laporan mahasiswa';
        $data['dlp'] = $this->laporanModel->getLaporanPerpertemuan($kodemk, $kodepertemuan, $idmhs); //dlp data laporan perpertemuan
        $data['mhs'] = $this->userModel->getProfile($idmhs);
        $data['cn'] = $hasilnya; //cn cek nilai apakah sudah ada.
        // dd($data['cn']);
        return view('dosen/pratinjau_laporan', $data);
    }

    public function inputNilai()
    {

        // kodemk koper imas npm nilap saran
        // standar penilaian ibi darmajaya berdasarkan web http://apt.darmajaya.ac.id/file_dokumen/Peraturan%20Akademik.pdf
        // >80
        // 66-80
        // 51-65
        // 40-50
        // <40

        $huruf = '0';
        $nilai = $this->request->getVar('nilap');
        if ($nilai > 80) {
            $huruf = 'A';
        } else if ($nilai >= 66 && $nilai <= 80) {
            $huruf = 'B';
        } else if ($nilai >= 51 && $nilai <= 65) {
            $huruf = 'C';
        } else if ($nilai >= 40 && $nilai <= 50) {
            $huruf = 'D';
        } else if ($nilai < 40) {
            $huruf = 'E';
        } else {
            $huruf = 'nilai tidak valid';
        }

        $kodemk = $this->request->getVar('km');
        $koper = $this->request->getVar('koper');
        $imas = $this->request->getVar('imas');


        $this->nilaiModel->save([
            'kode_mk' => $kodemk,
            'kode_pertemuan' => $koper,
            'npm' => $this->request->getVar('npm'),
            'id_mahasiswa' => $imas,
            'id_laporan' => $this->request->getVar('idtugas'),
            'huruf_mutu' => $huruf,
            'nilai_angka' => $this->request->getVar('nilap'),
            'saran' => $this->request->getVar('saran'),
        ]);


        session()->setFlashdata('pesan', 'Data nilai berhasil di tambahkan !');

        // dd($kodemk . $koper . $imas);
        // return redirect()->to("dosen/lihatLaporanUntukPenilaian/$kodemk/$koper/$imas");
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    public function updateNilai()
    {
        $huruf = '0';
        $nilai = $this->request->getVar('nilap');
        if ($nilai > 80) {
            $huruf = 'A';
        } else if ($nilai >= 66 && $nilai <= 80) {
            $huruf = 'B';
        } else if ($nilai >= 51 && $nilai <= 65) {
            $huruf = 'C';
        } else if ($nilai >= 40 && $nilai <= 50) {
            $huruf = 'D';
        } else if ($nilai < 40) {
            $huruf = 'E';
        } else {
            $huruf = 'nilai tidak valid';
        }

        $kodemk = $this->request->getVar('km');
        $koper = $this->request->getVar('koper');
        $imas = $this->request->getVar('imas');


        $this->nilaiModel->save([
            'id' => $this->request->getVar('idn'),
            'kode_mk' => $kodemk,
            'kode_pertemuan' => $koper,
            'npm' => $this->request->getVar('npm'),
            'id_mahasiswa' => $imas,
            'id_laporan' => $this->request->getVar('idtugas'),
            'huruf_mutu' => $huruf,
            'nilai_angka' => $this->request->getVar('nilap'),
            'saran' => $this->request->getVar('saran'),
        ]);


        session()->setFlashdata('pesan', 'Data nilai berhasil di update !');

        // dd($kodemk . $koper . $imas);
        // return redirect()->to("dosen/lihatLaporanUntukPenilaian/$kodemk/$koper/$imas");
        return redirect()->to($_SERVER['HTTP_REFERER']);
    }

    // end nilai
    public function coba()
    {
        dd($this->request->getVar());
    }

    public function simpanTugas()
    {
        $idpertemuan = $this->request->getVar('idpertemuan');
        $kodepertemuan = $this->request->getVar('kode_pertemuan');
        $idtugas = $this->request->getVar('idtugas');
        $kodemk = $this->request->getVar('kode_mk');
        // $validation = \Config\Services::validation();
        if (!$this->validate([
            'judul_prak' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'judul tidak boleh kosong !'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'deskripsi tidak boleh kosong !'
                ]
            ],
            'file_prak' => [
                'rules' => 'uploaded[file_prak]|ext_in[file_prak,rar,zip,pdf,doc,docx]',
                'errors' => [
                    'uploaded' => 'file instruksi praktikum tidak boleh kosong !',
                    'ext_in' => ' tipe file tidak sesuai !'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();

            return redirect()->to("dosen/detailPertemuan/$idpertemuan")->withInput();

            // cara return view
            // $data['validasi'] = $validation;
            //return view("dosen/detailPertemuan/$idpertemuan", $data);
        }

        // ambil gambar
        $file_instruksi = $this->request->getFile('file_prak');
        $file_instruksi->move('upload_instruksi');
        $namafile = $file_instruksi->getName();
        $tanggal = $this->request->getVar('tanggal');
        $jam = $this->request->getVar('jam');
        $deadline = $tanggal . " " . $jam;


        // judul_prak, deskripsi, tanggal, jam, file_prak, || btn tambahPraktikum
        $this->tugasModel->save([
            'id_tugas' => $idtugas,
            'kode_mk' => $kodemk,
            'id_pertemuan' => $kodepertemuan,
            'judul' => $this->request->getVar('judul_prak'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'deadline' => $deadline,
            'file_instruksi' => $namafile
        ]);
        $this->detailPertemuanModel->updateKodePertemuan($idtugas, $kodemk, $kodepertemuan);

        session()->setFlashdata('pesan', 'Data pertemuan berhasil di tambahkan !');
        return redirect()->to("dosen/kelolaKelas/$kodemk");
    }

    public function lihatMahasiswa($kodemk)
    {
        $data['menu'] = 'daftarkelas';
        $data['title'] = 'lihat daftar mahasiswa';
        $data['dk'] = $this->mkModel->getKelas($kodemk);
        $data['dm'] = $this->kelasMhs->getDataMhsDosen($kodemk); //data mahasiswa (dm)

        return view('/dosen/lihat_mahasiswa', $data);
    }

    public function lihatLaporanMahasiswa($kodemk, $idmhs)
    {
        $data = [
            'menu' => 'daftarkelas',
            'title' => 'data laporan mahasiswa',
            'laporan' => $this->laporanModel->getAllLaporan($kodemk, $idmhs),
            'mhs' => $this->userModel->getProfile($idmhs)
        ];

        return view('mahasiswa/laporan_lengkap', $data);
    }
}
