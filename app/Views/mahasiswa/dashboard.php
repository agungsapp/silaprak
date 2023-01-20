<?= $this->extend('mahasiswa/template/index'); ?>
<?= $this->section('content'); ?>


<div class="page-heading">
  <h3>Dashboard </h3>
</div>
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-9">
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
                <div class="card border mt-5" style="width: 18rem;">
                  <img src="<?= base_url(); ?>/dosen/assets/images/samples/1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $m['kode_mk'] . ' | ' . $m['mata_kuliah']   ?></h5>
                    <p class="card-text"><?= $m['firstName'] . ' ' . $m['lastName']; ?></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $m['hari']; ?></li>
                    <li class="list-group-item"><?= $m['jam']; ?> WIB</li>
                    <li class="list-group-item"><?= $m['sks']; ?> SKS</li>
                  </ul>
                  <div class="card-body">
                    <!-- modal daftar kelas -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#daftarKelasModal<?= $m['kode_mk']; ?>">
                      Daftarkan saya
                    </button>
                    <!-- modal body start -->
                    <div class="modal fade" id="daftarKelasModal<?= $m['kode_mk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <!-- form start -->
                        <form action="/mahasiswa/daftarkan" method="post">
                          <?= csrf_field(); ?>
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin akan daftar kelas <?= $m['mata_kuliah']; ?> ?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <h5>Setelah anda menekan <strong>Yakin</strong> Tindakan ini tidak dapat dibatalkan !</h5>
                              <input type="text" name="kode_mk" value="<?= $m['kode_mk']; ?>">
                              <input type="text" name="id_dosen" value="<?= $m['id_dosen']; ?>">
                              <input type="text" name="matkul" value="<?= $m['mata_kuliah']; ?>">
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
      <!-- list info top start -->
      <!-- <div class="row">
        <div class="d-flex col-6 col-lg-3 col-md-6">
          <div class="card">
            <h5 class="card-header">Kelas Anda</h5>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div> -->
      <!-- list info end -->
    </div>

    <div class="col-12 col-lg-3">
      <div class="card">
        <div class="card-body py-4 px-4">
          <div class="d-flex align-items-center">
            <div class="avatar avatar-xl">
              <img src="<?= base_url(); ?>/dosen/assets/images/faces/1.jpg" alt="Face 1">
            </div>
            <div class="ms-3 name">
              <h5 class="font-bold"><?= user()->firstName . " " . user()->lastName; ?></h5>
              <h6 class="text-muted mb-0">@<?= user()->username; ?></h6>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <h4>Info</h4>
        </div>
        <div class="card-content pb-4 px-4">
          <table class="table">
            <tbody>
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= user()->firstName . " " . user()->lastName; ?></td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td>@<?= user()->username; ?></td>
              </tr>
              <tr>
                <td>e-mail</td>
                <td>:</td>
                <td><?= user()->email; ?></td>
              </tr>
              <tr>
                <td>Role</td>
                <td>:</td>
                <td><span class="badge text-bg-primary">mahasiswa</span></td>
              </tr>
            </tbody>
          </table>
          <a href="index.html" class='btn btn-danger'>
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>