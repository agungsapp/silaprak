<?php

namespace App\Controllers;

use \App\Models\MahasiswaModel;
use \App\models\DosenModel;
use \App\models\UsersModel;

class Home extends BaseController
{
    protected $dosenModel, $mahasiswaModel, $usersModel;
    public function __construct()
    {
        $this->dosenModel = new DosenModel();
        $this->mahasiswaModel = new MahasiswaModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        if (in_groups('super-admin')) {
            echo "login as super-admin";
            return redirect()->to('/super');
        } else if (in_groups('dosen')) {
            // echo "logis as dosen";
            // return redirect()->to('/dosen');


            // // cek apakah sudah ada
            // $cek = $this->dosenModel->cekAda(user_id());
            // // dd($cek);

            // if ($cek > 0) {
            //     echo "<script> alert('iya ini ada') </script>";
            //     return redirect()->to('/dosen');
            // } else {
            //     echo "<script> alert('ini ga ada') </script>";
            //     $user = $this->usersModel->where('id', user_id())->find(user_id());
            //     $simpan = $this->dosenModel->save([
            //         'id_dosen' => $user['id'],
            //         'first_name' => $user['firstName'],
            //         'last_name' => $user['lastName'],
            //         'username' => $user['username'],
            //         'email' => $user['email'],
            //         'nip' => $user['npm']
            //     ]);
            //     if ($simpan == true) {
            //         echo "oke";
            //         redirect()->to('/dosen');
            //     }
            // }

            echo "<script> alert('update data dosen') </script>";
            // foreach ($userdata as $u)

            $simpan = $this->dosenModel->save([
                'id_dosen' => user()->id,
                'first_name' => user()->firstName,
                'last_name' => user()->lastName,
                'username' => user()->username,
                'email' => user()->email,
                'npm' => user()->npm
            ]);

            return redirect()->to('/dosen');

            // jika yang login role mahasiswa
        } else {
            // cek apakah sudah ada
            // $cek = $this->mahasiswaModel->cekAda(user_id());
            // // dd($cek);

            // if ($cek > 0) {
            //     echo "<script> alert('iya ini ada') </script>";
            //     return redirect()->to('/mahasiswa');
            // } else {
            //     echo "<script> alert('ini ga ada') </script>";

            //     $user = $this->usersModel->where('id', user_id())->find(user_id());
            //     // foreach ($userdata as $u)

            //     $simpan = $this->mahasiswaModel->save([
            //         'id_mahasiswa' => $user['id'],
            //         'first_name' => $user['firstName'],
            //         'last_name' => $user['lastName'],
            //         'username' => $user['username'],
            //         'email' => $user['email'],
            //         'npm' => $user['npm']
            //     ]);

            //     if ($simpan == true) {
            //         redirect()->to('/mahasiswa');
            //     }
            // }

            // cek apakah sudah ada

            echo "<script> alert('update data') </script>";
            // foreach ($userdata as $u)

            $simpan = $this->mahasiswaModel->save([
                'id_mahasiswa' => user()->id,
                'first_name' => user()->firstName,
                'last_name' => user()->lastName,
                'username' => user()->username,
                'email' => user()->email,
                'npm' => user()->npm
            ]);

            return redirect()->to('/mahasiswa');





            // return redirect()->to('/mahasiswa');
        }
        // return view('auth/login');
    }

    // public function register()
    // {
    //     return view('auth/register');
    // }
    // public function dosen()
    // {
    //     return view('dosen/index');
    // }
}
