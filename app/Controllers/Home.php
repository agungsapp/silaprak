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
        } else {

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
