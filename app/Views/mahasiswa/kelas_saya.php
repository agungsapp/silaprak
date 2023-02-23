<?= $this->extend('mahasiswa/template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last" data-aos="zoom-in" data-aos-duration="1000">
        <h3>Daftar Kelas</h3>
        <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Kelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kelas Saya</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>



  <!-- Hoverable rows start -->
  <div class="card" data-aos="zoom-in" data-aos-duration="1000">
    <h5 class="card-header border bg-primary text-light">Kelas anda</h5>
    <div class="card-body border d-flex flex-wrap justify-content-around">

      <!-- loop hasil pencarian -->
      <?php foreach ($matkul as $m) : ?>
        <div class="card border mt-5" style="width: 18rem;">
          <img src="<?= base_url(); ?>/dosen/assets/images/samples/1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $m['kode_mk'] . ' | ' . $m['mata_kuliah']; ?></h5>
            <p class="card-text"><?= $m['first_name'] . ' ' . $m['last_name']; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $m['hari']; ?></li>
            <li class="list-group-item"><?= $m['jam']; ?> WIB</li>
            <li class="list-group-item"><?= $m['sks']; ?> SKS</li>
          </ul>
          <div class="card-body">
            <a href="/mahasiswa/masukKelas/<?= $m['id_kelas']; ?>/<?= $m['kode_mk']; ?>" class="btn btn-primary"> <i class="fa-solid fa-right-to-bracket"></i><span class="ms-1">Masuk</span></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#konfirmasiHapus<?= $m['id_kelas'] ?>">
              Hapus Kelas
            </button>
            <!-- Modal -->
            <div class="modal fade" id="konfirmasiHapus<?= $m['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Anda Yakin ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>apakah anda yakin ingin menghapus <?= $m['mata_kuliah']; ?> dari daftar matakuliah yang anda ikuti ?, jika anda menekan hapus, tindakan ini tidak dapat dibatalkan.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="/mahasiswa/hapusKelasIkuti/<?= $m['id_kelas']; ?>" class="btn btn-primary">Ya! Hapus</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      <?php endforeach ?>

      <!-- loop end -->

    </div>
  </div>
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>