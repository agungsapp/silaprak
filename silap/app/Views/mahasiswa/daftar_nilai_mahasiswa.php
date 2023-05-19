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
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Table</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- card start mata kuliah -->
  <div class="card">
    <div class="card-header bg-primary py-3 ">
      <h3 class="text-white fs-4">Mata Kuliah</h3>
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

  <!-- card rangkuman nilai -->
  <div class="card">
    <div class="card-header border py-2 bg-primary text-white fs-5">
      Nilai Rata - Rata
    </div>
    <div class="card-body p-3">

      <div class="row d-flex flex-column flex-lg-row-reverse">
        <div class="col-12 col-lg-2">
          <div class="d-flex justify-content-lg-end justify-content-sm-start">
          </div>
        </div>
        <div class="col-12 col-lg-10 mt-3 mt-lg-0">
          <div class="d-flex justify-content-between justify-content-lg-start">
            <div class="d-flex flex-column align-items-center">
              <p class="fw-bold">huruf mutu</p>
              <div style="width: 100px; height: 100px;" class="huruf-mutu border bg-primary bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= $ns['huruf_mutu']; ?></div>
            </div>
            <div class="d-flex flex-column align-items-center">
              <p class="fw-bold">nilai</p>
              <div style="width: 100px; height: 100px;" class="nilai-angka border bg-success bg-opacity-50 ms-2 fw-bold fs-2 d-flex justify-content-center align-items-center"><?= substr($ns['nilai_rata_rata'], 0, 2);; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- card rangkuman nilai end -->


  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Daftar Nilai</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Pertemuan</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($dn)) : ?>
                      <tr>
                        <td class="text-center" colspan="4">- Belum Ada Penilaian -</td>
                      </tr>
                    <?php else : ?>
                      <?php $i = 1; ?>
                      <?php foreach ($dn as $d) : ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-bold-500"><?= 'Pertemuan' . " " . $d['kode_pertemuan']; ?></td>
                          <td><?= $d['nilai_angka']; ?></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- table hover -->

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>