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
            <h4 class="card-title">Daftar Mahasiswa</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Mahasiswa</th>
                      <th>Npm</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dm as $d) : ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td class="text-bold-500"><?= $d['first_name'] . " " . $d['last_name']; ?></td>
                        <td><?= $d['npm']; ?></td>
                        <td>
                          <a href="/dosen/detailNilai/<?= $d['kode_mk']; ?>/<?= $d['id_mahasiswa']; ?>" class="btn btn-success" style="margin-left: 10px;"><i class="fa-regular fa-eye"></i><span class="ms-3">Detail Nilai</span></a>
                          <!-- baru sampe sini bruh -->
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