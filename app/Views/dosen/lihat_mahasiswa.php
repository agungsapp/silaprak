<?= $this->extend('dosen/template/index'); ?>
<?= $this->section('content'); ?>



<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last" data-aos="fade-up">
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
            <h3 class="text-white fs-4"><?= $dk['mata_kuliah']; ?></h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless mt-2 fs-5">
              <tbody>
                <tr>
                  <td>Mata Kuliah</td>
                  <td>:</td>
                  <td><?= $dk['kode_mk']; ?> | <?= $dk['mata_kuliah']; ?></td>
                </tr>

                <tr>
                  <td>Dosen Pengajar</td>
                  <td>:</td>
                  <td><?= $dk['firstName']; ?> <?= $dk['lastName'] ?></td>
                </tr>

                <tr>
                  <td>Hari</td>
                  <td>:</td>
                  <td><?= $dk['hari']; ?></td>
                </tr>

                <tr>
                  <td>Jam</td>
                  <td>:</td>
                  <td><?= $dk['jam']; ?></td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>

        <!-- card mata kuliah end -->

        <!-- card pertemuan -->
        <div class="card">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Npm</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($dm as $d) : ?>
                <tr class="align-baseline">
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $d['first_name'] . " " . $d['last_name']; ?></td>
                  <td><?= $d['npm']; ?></td>
                  <td>
                    <a href="/dosen/lihatLaporanMahasiswa/<?= $d['kode_mk']; ?>/<?= $d['id_mahasiswa']; ?>" class="btn btn-success">Detail Laporan</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- card pertemuan -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>