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
          <h3>Data Kelas</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode MK</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Nama Dosen</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($data as $d) :  ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $d->kode_mk; ?></td>
                  <td><?= $d->mata_kuliah; ?></td>
                  <td><?= $d->first_name . " " . $d->last_name; ?></td>
                  <td>
                    <a href="/admin/details/<?= $d->kode_mk ?>" class="btn btn-success">Detail</a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>


<?= $this->endSection(); ?>


<!-- noted buatkan method save untuk form input jam -->