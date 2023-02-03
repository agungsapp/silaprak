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

        <!-- card pertemuan -->
        <div class="card">
          <h5 class="card-header">Pertemuan</h5>
          <div class="card-body">
            <!-- Button trigger modal -->
            <?php foreach ($pertemuan as $p) : ?>
              <!-- pertemuan  -->
              <!-- acordion start -->
              <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
                <!-- item -->
                <div class="accordion-item">
                  <h2 class="accordion-header border" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne<?= $p['id']; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      <strong>Pertemuan </strong>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne<?= $p['id']; ?>" class="accordion-collapse collapse border" aria-labelledby="panelsStayOpen-headingOne">

                    <div class="accordion-body shadow-md text-black d-flex flex-column">
                      <!-- jika belum ada tugas -->
                      <?php if ($p['kode_tugas'] == null) : ?>
                        <div class="card-body text-center">
                          <h5 class="text-muted">-- Belum ada data instruksi praktikum --</h5>
                        </div>
                      <?php else :  ?>
                        <h5 class="text-center text-black"><?= $p['judul']; ?></h6>
                          <hr>
                          <p><?= $p['deskripsi']; ?></p>

                          <div class="btn btn-danger mb-2 bg-gradient opacity-50"><span class="opacity-100">file materi : <?= $p['file_instruksi']; ?></span></div>
                          <div class="d-flex justify-content-between justify-content-lg-end">
                            <a href="/mahasiswa/download/<?= $p['kode_tugas']; ?>" class="btn btn-info bg-gradient">Download</a>
                            <a href="/mahasiswa/kerjakanLaporan/<?= $p['kode_mk'] . "/" . $p['kode_pertemuan'] . "/" . $p['kode_tugas']; ?>" class="btn btn-primary bg-gradient ms-lg-2">Kerjakan Laporan</a>
                          </div>

                        <?php endif ?>
                    </div>
                  </div>
                </div>
              </div>
              <!-- acordion end -->
              <!-- pertemuan end -->
            <?php endforeach ?>
          </div>
        </div>
        <!-- card pertemuan -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>

<?= $this->endSection(); ?>