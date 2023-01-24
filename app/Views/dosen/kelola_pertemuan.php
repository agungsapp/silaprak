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
        <div class="card">
          <div class="card-header bg-primary py-3 ">
            <h3 class="text-white fs-4"><?= 'Pertemuan' . ' ' . $pertemuan['kode_pertemuan']; ?></h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless mt-2 fs-5">
              <tbody>
                <tr>
                  <td>Mata Kuliah</td>
                  <td>:</td>
                  <td> <?= $pertemuan['kode_mk']; ?> | <?= $pertemuan['mata_kuliah']; ?></td>
                </tr>

                <tr>
                  <td>Dosen Pengajar</td>
                  <td>:</td>
                  <td><?= $pertemuan['firstName'] . ' ' . $pertemuan['lastName'] ?></td>
                </tr>

                <tr>
                  <td>Hari</td>
                  <td>:</td>
                  <td><?= $pertemuan['hari']; ?></td>
                </tr>

                <tr>
                  <td>Jam</td>
                  <td>:</td>
                  <td><?= $pertemuan['jam']; ?></td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>

        <!-- card mata kuliah end -->

        <!-- form tugas  start -->
        <div class="card">
          <div class="card-header fs-md-1">
            Buat Kegiatan Praktikum
          </div>
          <div class="card-body">
            <!-- cek apakah ada data sebelumnya -->
            <?php if ($datatugas->getNumRows() > 0) :
              $dl =  $datatugas->getRowArray() ?>
              <h4 class="mt-3 mb-5">Data praktikum sebelumnya</h4>
              <form action="/dosen/simpanTugas" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- judul_prak, deskripsi, tanggal, jam, file_prak, || btn tambahPraktikum -->
                <!-- id pertemuan hidden -->
                <input type="hidden" name="idpertemuan" value="<?= $dl['id_pertemuan'] ?>">
                <!-- kode kelas hidden -->
                <input type="hidden" name="kode_mk" value="<?= $dl['id_tugas'] ?>">
                <!-- kode tugas generate hidden -->
                <input type="hidden" name="idtugas" id="idtugas" value="<?= $idtugas; ?>">

                <!-- judul_prak -->
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="judul_prak" class="form-label">Judul</label><!-- ($validation->hasError('judul_prak')) ? 'is-invalid' : '' -->
                    <input type="text" name="judul_prak" class="form-control <?= $validation->hasError('judul_prak') ? "is-invalid" : ""; ?> " id="judul_prak" placeholder="judul Tugas ..." autofocus value="<?= $dl['judul'] ?>">
                    <div class="invalid-feedback mt-2">
                      <?= $validation->getError('judul_prak'); ?>
                    </div>
                  </div>
                </div>
                <!-- deskripsi -->
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control <?= $validation->hasError('deskripsi') ? "is-invalid" : ""; ?>" name="deskripsi" id="deskripsi" rows="3" placeholder="input deskripsi tugas ..."><?= $dl['deskripsi']; ?></textarea>
                  <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                  </div>
                </div>


                <?php if ($dl['deadline'] == 100) : ?>
                <?php else : ?>
                  <div class="col-md-6" style="display: none;" id="deadline">
                    <label for="datepicker" class="col-sm-6 col-form-label">Batas Waktu Pengumpulan</label>
                    <div class="input-group mb-5">
                      <!-- tanggal -->
                      <input type="text" class="form-control date" name="tanggal" id="datepicker" value="0">
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                      <!-- <span class="input-group-text">@</span> -->
                      <i class="fa-solid fa-calendar-days bg-white d-block input-group-text"></i>
                      <!-- jam -->
                      <input type="text" name="jam" id="jam" class="form-control text-center" value="0">
                      <div class="invalid-feedback">
                        Please choose a username.
                      </div>
                    </div>
                  </div>
                <?php endif ?>

                <!-- input upload berkas -->
                <div class="col-md-6">
                  <div class="mt-5">
                    <label for="file_tugas" class="form-label">Upload Instruksi Praktikum</label>
                    <!-- file_prak -->
                    <input type="file" name="file_prak" class="form-control <?= $validation->hasError('file_prak') ? "is-invalid" : ""; ?>" id="file_tugas" placeholder="judul Tugas ..." value="<?= $dl['file_instruksi']; ?>">
                    <div class="invalid-feedback">
                      <?= $validation->getError('file_prak'); ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-7 mt-3">
                  <button type="submit" name="tambahPraktikum" class="btn btn-success">Tambahkan Praktikum Baru</button>
                </div>
              </form>
            <?php else : ?>
              <!-- form start -->
              <form action="/dosen/simpanTugas" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- judul_prak, deskripsi, tanggal, jam, file_prak, || btn tambahPraktikum -->
                <!-- id pertemuan hidden -->
                <input type="hidden" name="idpertemuan" value="<?= $pertemuan['id'] ?>">
                <!-- kode kelas hidden -->
                <input type="hidden" name="kode_mk" value="<?= $pertemuan['kode_mk'] ?>">
                <!-- kode tugas generate hidden -->
                <input type="hidden" name="idtugas" id="idtugas" value="<?= $idtugas; ?>">

                <!-- judul_prak -->
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="judul_prak" class="form-label">Judul</label><!-- ($validation->hasError('judul_prak')) ? 'is-invalid' : '' -->
                    <input type="text" name="judul_prak" class="form-control <?= $validation->hasError('judul_prak') ? "is-invalid" : ""; ?> " id="judul_prak" placeholder="judul Tugas ..." autofocus value="<?= old('judul_prak'); ?>">
                    <div class="invalid-feedback mt-2">
                      <?= $validation->getError('judul_prak'); ?>
                    </div>
                  </div>
                </div>
                <!-- deskripsi -->
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi</label>
                  <textarea class="form-control <?= $validation->hasError('deskripsi') ? "is-invalid" : ""; ?>" name="deskripsi" id="deskripsi" rows="3" placeholder="input deskripsi tugas ..."><?= old('deskripsi'); ?></textarea>
                  <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                  </div>
                </div>


                <!-- togle deadline -->
                <div class="col-md-6 mt-5 mb-4">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="toggle" onchange="tampilDeadline()">
                    <label class="form-check-label" for="toggle">Tambah kan deadline</label>
                  </div>
                </div>


                <div class="col-md-6" style="display: none;" id="deadline">
                  <label for="datepicker" class="col-sm-6 col-form-label">Batas Waktu Pengumpulan</label>
                  <div class="input-group mb-5">
                    <!-- tanggal -->
                    <input type="text" class="form-control date" name="tanggal" id="datepicker" value="0">
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                    <!-- <span class="input-group-text">@</span> -->
                    <i class="fa-solid fa-calendar-days bg-white d-block input-group-text"></i>
                    <!-- jam -->
                    <input type="text" name="jam" id="jam" class="form-control text-center" value="0">
                    <div class="invalid-feedback">
                      Please choose a username.
                    </div>
                  </div>
                </div>

                <!-- input upload berkas -->
                <div class="col-md-6">
                  <div class="mt-5">
                    <label for="file_tugas" class="form-label">Upload Instruksi Praktikum</label>
                    <!-- file_prak -->
                    <input type="file" name="file_prak" class="form-control <?= $validation->hasError('file_prak') ? "is-invalid" : ""; ?>" id="file_tugas" placeholder="judul Tugas ...">
                    <div class="invalid-feedback">
                      <?= $validation->getError('file_prak'); ?>
                    </div>
                  </div>
                </div>

                <div class="col-md-7 mt-3">

                  <button type="submit" name="tambahPraktikum" class="btn btn-success">Tambahkan Praktikum Baru</button>
                </div>

                <!-- <div class="mb-3">
                <label for="type" class="form-label">Type Praktikum</label>
                <select id="type" class="form-select" name="type">
                  <option selected>-- Pilih Type --</option>
                  <option value="1">Multiple Choice</option>
                  <option value="2">Coding</option>
                  <option value="3">SQL</option>
                </select>
              </div> -->

                <!-- <div class="mb-3">
                <label for="date" class="col-sm-1 col-form-label">Date</label>
                <div class="input-group date" id="datepicker">
                  <input type="text" class="form-control">
                  <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                      <i class="fa fa-calendar"></i>
                    </span>
                  </span>
                </div>
              </div> -->

                <!-- <div class="mb-3">
                <label for="jam" class="form-label">Jam</label>
                <input type="text" name="jam" class="form-control" id="jam">
              </div> -->



                <!-- BELOM KELAR GAN , MASIH ADA PR DI SINI. KIRA KIRA GIMANA TIPE SOALNYA. -->

              </form>
              <!-- form end -->
            <?php endif ?>

          </div>
        </div>
        <!-- form tugas end -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>

<?= $this->endSection(); ?>