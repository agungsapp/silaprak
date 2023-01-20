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
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Table</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>



  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Daftar seluruh kelas anda</h4>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKelas">
              <i class="fa-solid fa-plus"></i>
              Tambah Kelas Baru
            </button>
            <!-- buton trigger modal end -->
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Kode MK</th>
                      <th>Mata Kuliah</th>
                      <th>SKS</th>
                      <th>Hari</th>
                      <th>Jam</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($matkul as $mk) : ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-bold-500"><?= $mk['kode_mk']; ?></td>
                        <td><?= $mk['mata_kuliah']; ?></td>
                        <td><?= $mk['sks']; ?> SKS</td>
                        <td class="text-bold-500"><?= $mk['hari']; ?></td>
                        <td><?= $mk['jam']; ?></td>
                        <td>
                          <a href="/dosen/kelolaKelas/<?= $mk['kode_mk']; ?>" class="btn btn-success" style="margin-left: 10px;"><i class="fa-regular fa-eye"></i><span class="ms-3">Lihat Mahasiswa</span></a>
                        </td>
                      </tr>
                    <?php endforeach ?>
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