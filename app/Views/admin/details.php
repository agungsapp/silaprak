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
                <th scope="col">Nama Mahasiswa</th>
                <th scope="col">Npm</th>
                <th scope="col" class="text-center">Nilai Rata - Rata</th>
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
                    <td><?= $d->first_name . " " . $d->last_name; ?></td>
                    <td><?= $d->npm; ?></td>
                    <td class="text-center"><?= substr($d->nilai_rata_rata, 0, 2); ?></td>
                    <td>
                      <a href="/admin/detail/<?= $d->kode_mk . "/" . $d->id_mahasiswa; ?>" class="btn btn-success">Detail Nilai</a>
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