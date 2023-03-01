<?= $this->extend('mahasiswa/template/index'); ?>
<?= $this->section('content'); ?>


<div class="page-heading">
  <h3>Dashboard </h3>
</div>
<div class="page-content">
  <section class="ms-0 ml-lg-2 row px-0">
    <div class="col-12 px-sm-0">
      <div class="card">
        <h5 class="card-header">Pencarian Kelas</h5>
        <div class="card-body">
          <form action="" method="post">
            <?= csrf_field(); ?>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="cari_matkul" placeholder="Cari mata kuliah ..." autocomplete="off">
              <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
            </div>
          </form>

          <!-- card hasil pencarian start -->
          <div class="card border">
            <!-- <h3>Kelas yang mungkin anda cari :</h3> -->
            <div class="card-body d-flex flex-wrap justify-content-around">

              <!-- loop hasil pencarian -->
              <?php foreach ($matkul as $m) : ?>
                <div class="card border mt-2 " style="width: 18rem;">
                  <img src="<?= base_url(); ?>/dosen/assets/images/samples/1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $m['kode_mk'] . ' | ' . $m['mata_kuliah']   ?></h5>
                    <p class="card-text" style="text-transform: capitalize;"><?= $m['first_name'] . ' ' . $m['last_name']; ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $m['hari']; ?></li>
                    <li class="list-group-item"><?= $m['jam']; ?> WIB</li>
                    <li class="list-group-item"><?= $m['sks']; ?> SKS</li>
                  </ul>
                  <div class="card-body">
                    <!-- modal daftar kelas -->
                    <button type="button" class="btn <?= $m['status'] == 1 ? 'btn-success' : 'btn-primary'; ?> " <?= $m['status'] == 1 ? 'disabled' : ''; ?> data-bs-toggle="modal" data-bs-target="#daftarKelasModal<?= $m['kode_mk']; ?>">
                      <?= $m['status'] == 1 ? 'Anda Sudah Terdaftar' : 'Daftarkan Saya'; ?>
                    </button>
                    <!-- modal body start -->
                    <div class="modal fade" id="daftarKelasModal<?= $m['kode_mk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-text="true">
                      <div class="modal-dialog">
                        <!-- form start -->
                        <form action="/mahasiswa/daftarkan" method="post">
                          <?= csrf_field(); ?>
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Mendaftar <?= $m['mata_kuliah']; ?> ?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <h5>Setelah anda menekan <strong>Yakin</strong> Anda akan terdaftar pada mata kuliah <strong><?= $m['mata_kuliah']; ?></strong> !</h5>
                              <input type="hidden" name="kode_mk" value="<?= $m['kode_mk']; ?>">
                              <input type="hidden" name="id_dosen" value="<?= $m['id_dosen']; ?>">
                              <input type="hidden" name="matkul" value="<?= $m['mata_kuliah']; ?>">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Yakin</button>
                            </div>
                          </div>
                        </form>
                        <!-- form end  -->
                      </div>
                    </div>
                    <!-- modal body end -->
                  </div>
                </div>
              <?php endforeach ?>
              <!-- loop end -->

            </div>
          </div>
          <!-- card hasil pencarian end -->
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>