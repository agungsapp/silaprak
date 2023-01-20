<?php

namespace App\Controllers;

use PhpParser\Node\Stmt\Echo_;

class Super extends BaseController
{
  public function index()
  {
    echo "selamat datang super admin !!!";
    // return view('auth/login');
  }
}
