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
          <h5 class="card-header">Kelola Pertemuan</h5>

          <div class="card-body">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPertemuan">
              Tambah Pertemuan
            </button>
            <!-- pertemuan  -->
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">nama</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($lp as $l) : ?>
                  <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td>Pertemuan <?= $l['kode_pertemuan']; ?></td>
                    <td><a href="/dosen/detailPertemuan/<?= $l['id']; ?>" class="btn btn-success">Kelola Pertemuan</a></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- pertemuan end -->

          </div>
        </div>
        <!-- card pertemuan -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>

<!-- Modal -->
<div class="modal fade" id="modalTambahPertemuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <form action="/dosen/simpanPertemuanBaru" method="post">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pertemuan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mata Kuliah" value="<?= $dk['kode_mk']; ?>" readonly>
            <label for="kode_mk">Kode Mata Kuliah</label>
          </div>
          <br>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="kode_dosen" id="kode_dosen" placeholder="ID Dosen" value="<?= $dk['id_dosen']; ?>" readonly>
            <label for="kode_dosen">ID Dosen</label>
          </div>
          <br>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="kode_pertemuan" id="kode_pertemuan" placeholder="Pertemuan" value="<?= $dp; ?>" readonly>
            <label for="kode_pertemuan">Pertemuan</label>
          </div>
          <br>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Pertemuan baru</button>
        </div>
      </div>
    </form>

  </div>
</div>

<?= $this->endSection(); ?>