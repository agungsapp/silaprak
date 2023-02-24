<?= $this->extend('dosen/template/index'); ?>
<?= $this->section('content'); ?>




<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3><?= $title; ?></h3>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Table</li> -->
          </ol>
        </nav>
      </div>
    </div>
  </div>


  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12 p-4">
        <!-- card start mata kuliah -->


        <!-- card mata kuliah end -->


        <!-- card pengerjaan laporan -->

        <div class="card p-4">
          <div class="card-header bg-primary py-3">
            <h5 class="text-white">Pratinjau Laporan Pertemuan </h5>
          </div>
          <div class="card-body mt-4">

            <textarea name="isilaporan" id="editorpreview">

            <!-- data mahasiswa -->

<?php include('headerlaporan.php') ?>
            <hr>
            <!-- data mahasiswa end -->




                <?= $dlp['isi_laporan'] . "<br>" ?>

              </textarea>
          </div>
          <a href="#" class="btn btn-primary fs-4">Input Nilai</a>
        </div>

      </div>
      <!-- card pengerjaan laporan end -->

    </div>
</div>
</section>
<!-- Hoverable rows end -->

</div>



<?= $this->endSection(); ?>
<!-- 
udah sampe sini terakhir 20.28 jumat 24 februari
plan : 
- bikin modal input nilai
- bikin input type hidden untuk kode mk, kode pertemuan , id mahasiswa
- bikin input nilai dan deskripsi saran kepada mahasiswa
- bikinya dalam modal ya biar ga boros view , memaksimalkan load halaman. -->