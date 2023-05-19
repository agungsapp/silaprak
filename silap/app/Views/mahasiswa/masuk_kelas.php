<?= $this->extend('mahasiswa/template/index'); ?>
<?= $this->section('content'); ?>



<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last" data-aos="zoom-in" data-aos-duration="1000">
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
                  <td style="text-transform: capitalize;"><?= $kelas['first_name']; ?> <?= $kelas['last_name'] ?></td>
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

          <div class="card-header bg-primary py-3 d-flex justify-content-between align-items-baseline flex-wrap">
            <h5 class="text-white fs-sm-6">Pertemuan</h5>
            <a href="/mahasiswa/laporanLengkap/<?= $kelas['kode_mk']; ?>/<?= user_id(); ?>" class="btn btn-info fw-bold fs-lg-5 align-self-start">Lihat Laporan Lengkap</a>
          </div>


          <div class="card-body mt-3">
            <!-- Button trigger modal -->
            <?php if (!$pertemuan) : ?>
              <h5 class="text-center text-muted p-4">-- Belum Ada Data Pertemuan --</h5>
            <?php endif ?>
            <?php foreach ($pertemuan as $p) : ?>
              <?php $nilainya =  $p['nilai']; ?>
              <!-- pertemuan  -->
              <!-- acordion start -->
              <div class="accordion mt-1" id="accordionPanelsStayOpenExample">
                <!-- item -->
                <div class="accordion-item">
                  <h2 class="accordion-header border" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne<?= $p['id']; ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      <strong>Pertemuan <?= $p['kode_pertemuan']; ?></strong>
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
                        <div class="d-flex justify-content-between align-items-center px-4">
                          <h5 class="text-center text-black"><?= $p['judul']; ?></h5>
                          <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Tandai Sudah Selesai
                            </label>
                          </div> -->
                        </div>
                        <hr>
                        <p><?= $p['deskripsi']; ?></p>

                        <div class="btn btn-danger mb-2 bg-gradient opacity-50"><span class="opacity-100">file materi : <?= $p['file_instruksi']; ?></span></div>
                        <div class="d-flex justify-content-between justify-content-lg-end">
                          <a href="/mahasiswa/download/<?= $p['kode_tugas']; ?>" class="btn btn-info bg-gradient">Download</a>
                          <a href="/mahasiswa/kerjakanLaporan/<?= $p['kode_mk'] . "/" . $p['kode_pertemuan'] . "/" . $p['kode_tugas'] . "/" . $kelas['id_kelas']; ?>" class="btn btn-primary bg-gradient ms-lg-2 <?= $p['nilai'] == null ? '' : 'd-none'; ?>">Kerjakan Laporan</a>
                        </div>
                        <?php if ($p['nilai'] == null) : ?>
                        <?php else : ?>
                          <hr>
                          <div class="row d-flex flex-column flex-lg-row-reverse">
                            <div class="col-12 col-lg-2">
                              <div class="d-flex justify-content-lg-end justify-content-sm-start">
                                <!-- Button trigger modal -->

                              </div>
                            </div>
                            <div class="col-12 col-lg-10 mt-3 mt-lg-0">
                              <div class="d-flex justify-content-between justify-content-lg-start">
                                <div class="d-flex flex-column align-items-center">
                                  <p class="fw-bold">huruf mutu</p>
                                  <div style="width: 100px; height: 100px;" class="huruf-mutu border bg-primary bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= $p['huruf_mutu']; ?></div>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                  <p class="fw-bold">nilai </p>
                                  <div style="width: 100px; height: 100px;" class="nilai-angka border bg-success bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= $p['nilai'] ?></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif ?>
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



// =========================================================================================== //
// ======================== entah gimana pokonya eror bingung juga . ========================= //
// =========================================================================================== //