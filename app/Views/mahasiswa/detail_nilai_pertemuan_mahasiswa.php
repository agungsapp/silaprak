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



  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Daftar Laporan Mahasiswa</h4>

          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Pertemuan</th>
                      <th>Huruf Mutu</th>
                      <th>Nilai</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dpm as $d) : ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-bold-500"> Pertemuan <?= $d['kode_pertemuan']; ?></td>
                        <td><?= $d['huruf_mutu'] == null ? 'belum ada nilai' : $d['huruf_mutu']; ?></td>
                        <td><?= $d['nilai_angka'] == null ? 'belum ada nilai' : $d['nilai_angka']; ?></td>
                        <td>
                          <?php if ($d['id_laporan'] == null) : ?>
                            <span class="badge text-bg-danger">Belum di kerjakan</span>
                          <?php else : ?>
                            <span class="badge text-bg-success">Selesai</span>
                          <?php endif ?>
                        </td>
                        <td>
                          <a href="/dosen/lihatLaporanUntukPenilaian/<?= $d['kode_mk']; ?>/<?= $d['kode_pertemuan']; ?>/<?= $d['id_mahasiswa']; ?>" class="btn <?= ($d['id_laporan'] == null) ? 'btn-secondary disabled' : 'btn-success'; ?>">Lihat Laporan</a>

                          <!-- plan  -->
                          <!-- bikin button lihat laporan yang didalamnya ada button untuk input nilai.  -->

                        </td>
                      </tr>
                    <?php endforeach ?>

                    <!-- sampai sini bruh baruan,  tingal bikin modal cek laporan. perpetemuan -->
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