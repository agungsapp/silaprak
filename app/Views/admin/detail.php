<?= $this->extend('admin/template/index'); ?>
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
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Table</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3>Data Mahasiswa</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Pertemuan</th>
                <th scope="col">Nilai </th>
                <th scope="col" class="text-center">Huruf mutu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($data)) : ?>
                <tr>
                  <td colspan="4" class="text-center text-muted">-- Belum Ada Data --</td>
                </tr>
              <?php else : ?>
                <?php $i = 1; ?>
                <?php foreach ($data as $d) :  ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td>Pertemuan <?= $d->kode_pertemuan ?></td>
                    <td><?= $d->nilai_angka; ?></td>
                    <td class="text-center"><?= $d->huruf_mutu; ?></td>
                    <td>
                      <a href="/admin/lihatLaporan/<?= $d->kode_mk . "/" . $d->kode_pertemuan . "/" . $d->id_mahasiswa; ?>" class="btn btn-success text-white"><i class="fa-solid fa-note-sticky me-2"></i>Lihat Laporan</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


<?= $this->endSection(); ?>


<!-- noted buatkan method save untuk form input jam -->