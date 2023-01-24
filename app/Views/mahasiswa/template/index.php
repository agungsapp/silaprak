<?php

use CodeIgniter\Database\BaseUtils;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa | <?= $title; ?></title>

  <link rel="stylesheet" href="<?= base_url(); ?>/dosen/assets/css/main/app.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/dosen/assets/css/main/app-dark.css">
  <link rel="shortcut icon" href="<?= base_url(); ?>/dosen/assets/images/logo/favicon.svg" type="image/x-icon">
  <link rel="shortcut icon" href="<?= base_url(); ?>/dosen/assets/images/logo/favicon.png" type="image/png">

  <link rel="stylesheet" href="<?= base_url(); ?>/dosen/assets/css/shared/iconly.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
    @media only screen and (max-width: 600px) {
      td {
        font-size: 14px;
      }
    }
  </style>

</head>

<body>
  <div id="app">

    <?= $this->include('mahasiswa/template/sidebar'); ?>


    <div id="main" class="container p-2">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <?= $this->renderSection('content'); ?>

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="text-center">
            <p><?= date('Y'); ?> &copy; IIB Darmajaya</p>
            <p>Created with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://agungsapp.github.io/">Agung Saputra</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="<?= base_url(); ?>/dosen/assets/js/bootstrap.js"></script>
  <script src="<?= base_url(); ?>/dosen/assets/js/app.js"></script>

  <!-- Need: Apexcharts -->
  <script src="<?= base_url(); ?>/dosen/assets/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url(); ?>/dosen/assets/js/pages/dashboard.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="<?= base_url(); ?>/sweet/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>/sweet/js/flash.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: "<?= site_url('/dosen/kode'); ?>",
        type: "GET",
        success: function(hasil) {
          var obj = $.parseJSON(hasil);
          $('#kodemk').val(obj);
        }

      })
    });
  </script>

</body>

</html>