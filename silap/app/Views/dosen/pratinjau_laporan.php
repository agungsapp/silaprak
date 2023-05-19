  <?php

  use function PHPUnit\Framework\isNull;
  ?>
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
          <?php if ($cn != 0) : ?>
            <!-- card penilaian -->
            <div class="card">
              <div class="card-header border py-2 bg-primary text-white fs-5">
                Penilaian
              </div>
              <div class="card-body p-3">

                <div class="row d-flex flex-column flex-lg-row-reverse">
                  <div class="col-12 col-lg-2">
                    <div class="d-flex justify-content-lg-end justify-content-sm-start">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning bg-gradient" data-bs-toggle="modal" data-bs-target="#modalEditNilai">
                        <i class="bi bi-pencil"></i> Edit nilai
                      </button>
                    </div>
                  </div>
                  <div class="col-12 col-lg-10 mt-3 mt-lg-0">
                    <div class="d-flex justify-content-between justify-content-lg-start">
                      <div class="d-flex flex-column align-items-center">
                        <p class="fw-bold">huruf mutu</p>
                        <div style="width: 100px; height: 100px;" class="huruf-mutu border bg-primary bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= $cn['huruf_mutu']; ?></div>
                      </div>
                      <div class="d-flex flex-column align-items-center">
                        <p class="fw-bold">nilai</p>
                        <div style="width: 100px; height: 100px;" class="nilai-angka border bg-success bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= $cn['nilai_angka']; ?></div>
                      </div>
                    </div>
                  </div>

                </div>


                <div class="form-floating mt-4">
                  <input class="form-control border-secondary" name="saran" placeholder="Leave a comment here" id="saran" value="<?= $cn['saran']; ?>" readonly>
                  <label for="saran">Saran Laporan</label>
                </div>
              </div>
            </div>

            <!-- modal body edit data nilai -->
            <div class="modal fade" id="modalEditNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penilaian Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/dosen/updateNilai" method="post">
                    <div class="modal-body">
                      <!-- <label for="km">kode mk</label> -->
                      <input id="km" name="km" type="hidden" value="<?= $dlp['kode_mk']; ?>">
                      <!-- <label for="koper">kode pertemuan</label> -->
                      <input id="koper" name="koper" type="hidden" value="<?= $dlp['kode_pertemuan']; ?>">
                      <!-- <label for="imas">id mahasiswa</label> -->
                      <input id="imas" name="imas" type="hidden" value="<?= $dlp['id_mahasiswa']; ?>">
                      <input id="idtugas" name="idtugas" type="hidden" value="<?= $dlp['id_tugas']; ?>">
                      <!-- <label for="npm">id mahasiswa</label> -->
                      <input id="npm" name="npm" type="hidden" value="<?= $mhs['npm']; ?>">
                      <!-- <label for="idn">id nilai</label> -->
                      <input id="idn" name="idn" type="hidden" value="<?= $cn['id']; ?>">
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nilai Laporan</label>
                        <input type="number" class="form-control" name="nilap" id="exampleFormControlInput1" placeholder="Masukan Nilai Laporan ..." value="<?= $cn['nilai_angka']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="saran">Berikan Saran</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" name="saran" placeholder="Leave a comment here" id="saran"><?= $cn['saran']; ?></textarea>
                        <label for="saran">masukan saran ...</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>



          <?php endif ?>
          <!-- card penilaian end -->

          <!-- card mata kuliah end -->


          <!-- card pengerjaan laporan -->

          <div class="card p-4">
            <div class="card-header bg-primary py-3">
              <h5 class="text-white">Pratinjau Laporan Pertemuan </h5>
            </div>
            <div class="card-body border p-4">

              <textarea name="isilaporan" id="editorpreview" readonly>

              <!-- data mahasiswa -->

  <?php //include('headerlaporan.php') 
  ?>
              <!-- <hr> -->
              <!-- data mahasiswa end -->




                  <?= $dlp['isi_laporan'] . "<br>" ?>

                </textarea>
            </div>
            <!-- Button trigger modal input nilai -->
            <button type="button" class="btn btn-primary fs-5 <?= $cn != 0 ? /*jika ada */ 'd-none' : ''; ?>" data-bs-toggle="modal" data-bs-target="#modalNilai">
              Input Nilai
            </button>
            <!-- Modal nilai -->
            <div class="modal fade" id="modalNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Penilaian Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/dosen/inputNilai" method="post">
                    <div class="modal-body">
                      <div class="d-flex nowrap">
                        <!-- <label for="km">kode mk</label> -->
                        <input id="km" name="km" type="hidden" value="<?= $dlp['kode_mk']; ?>"><br>
                        <!-- <label for="koper">kode pertemuan</label> -->
                        <input id="koper" name="koper" type="hidden" value="<?= $dlp['kode_pertemuan']; ?>"><br>
                        <!-- <label for="imas">id mahasiswa</label> -->
                        <input id="imas" name="imas" type="hidden" value="<?= $dlp['id_mahasiswa']; ?>"><br>
                        <input id="idtugas" name="idtugas" type="hidden" value="<?= $dlp['id_tugas']; ?>"><br>
                        <!-- <label for="npm">id mahasiswa</label> -->
                        <input id="npm" name="npm" type="hidden" value="<?= $mhs['npm']; ?>"><br>
                      </div>
                      <div class="" style="margin-top: -100px;">
                        <label for="exampleFormControlInput1" class="form-label">Nilai Laporan</label>
                        <input type="number" class="form-control" name="nilap" id="exampleFormControlInput1" placeholder="Masukan Nilai Laporan ...">
                      </div>
                      <div class="mb-3">
                        <label for="saran">Berikan Saran</label>
                      </div>
                      <div class="form-floating">
                        <textarea class="form-control" name="saran" placeholder="Leave a comment here" id="saran"></textarea>
                        <label for="saran">masukan saran ...</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

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

  <!-- update !
  last 17.34 mixue 26 ferburari 2023
  modal > done
  input type > done
  form input > done

  sisa : 
  action form / setting controller -->



  inputan tabel nilai :
  kode mk
  npm
  huruf mutu
  nilai angka