<?= $this->extend('mahasiswa/template/index'); ?>
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
        <div class="card">
          <div class="card-header bg-primary py-3 ">
            <h3 class="text-white fs-4"><?= $kelas['mata_kuliah']; ?></h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless mt-2 fs-5">
              <tbody>
                <tr>
                  <td>Mata Kuliah</td>
                  <td>:</td>
                  <td><?= $kelas['kode_mk']; ?> | <?= $kelas['mata_kuliah']; ?></td>
                </tr>

                <tr>
                  <td>Dosen Pengajar</td>
                  <td>:</td>
                  <td><?= $kelas['first_name']; ?> <?= $kelas['last_name'] ?></td>
                </tr>

                <tr>
                  <td>Hari</td>
                  <td>:</td>
                  <td><?= $kelas['hari']; ?></td>
                </tr>

                <tr>
                  <td>Jam</td>
                  <td>:</td>
                  <td><?= $kelas['jam']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- card mata kuliah end -->


        <!-- card pengerjaan laporan -->
        <div class="card">
          <div class="card-header bg-primary py-3">
            <h5>Form Laporan Pertemuan <?= $kelas['kode_pertemuan']; ?></h5>
          </div>
          <div class="card-body mt-4">
            <div id="editor">
              <!-- <p>Mulai kerjakan laporan</p> -->
            </div>
          </div>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <!-- card pengerjaan laporan end -->

    </div>
</div>
</section>
<!-- Hoverable rows end -->

</div>



<?= $this->endSection(); ?>