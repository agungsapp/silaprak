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
          <div class="card-header">
            Form Tambah Tugas
          </div>
          <div class="card-body">
            <!-- form start -->
            <form action="" method="post">

              <div class="mb-3">
                <label for="judul_tugas" class="form-label">Judul</label>
                <input type="text" name="judul_tugas" class="form-control" id="judul_tugas" placeholder="judul Tugas ...">
              </div>

              <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="input deskripsi tugas ..."></textarea>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Type Praktikum</label>
                <select id="type" class="form-select" name="type">
                  <option selected>-- Pilih Type --</option>
                  <option value="1">Multiple Choice</option>
                  <option value="2">Coding</option>
                  <option value="3">SQL</option>
                </select>
              </div>

              <!-- BELOM KELAR GAN , MASIH ADA PR DI SINI. KIRA KIRA GIMANA TIPE SOALNYA. -->

            </form>
            <!-- form end -->
          </div>
        </div>
        <!-- form tugas end -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>