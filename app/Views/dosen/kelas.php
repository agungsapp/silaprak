<?= $this->extend('dosen/template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Daftar Kelas</h3>
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
                        <td id="aksidaftarkelas">
                          <a href="#" class="fs-5 btn btn-warning" style="margin-right: 10px;"><i class="fa-solid fa-pen"></i></a>
                          <a href="#" class="fs-5 btn btn-danger fs-5"><i class="fa-solid fa-trash-can"></i></a>
                          <a href="/dosen/kelolaKelas/<?= $mk['kode_mk']; ?>" class="fs-5 btn btn-success" style="margin-left: 10px;">Kelola</a>
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

<!-- Modal tambah kelas start -->
<div class="modal fade" id="tambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- form  input data kelas -->
    <form action="/dosen/simpanKelas" method="post">
      <?= csrf_field(); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelas Baru</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- kode mk -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="kodemk" id="kodemk" placeholder="Kode Mata Kuliah" readonly>
            <label for="matkul">Kode Mata Kuliah</label>
          </div>
          <br>

          <!-- hiden id dosen  -->
          <input type="hidden" name="iddosen" value="<?= user()->id; ?>">
          <!-- form input nama mk -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="namamk" id="matkul" placeholder="Mata Kuliah">
            <label for="matkul">Mata Kuliah</label>
          </div>
          <br>
          <!-- select start -->
          <select class="form-select" name="hari" aria-label="Default select example">
            <option selected>Pilih Hari</option>
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jumat</option>
          </select>
          <br>

          <select class="form-select" name="sks" aria-label="Default select example">
            <option selected>Jumlah SKS</option>
            <option value="2">2 SKS</option>
            <option value="4">4 SKS</option>
          </select>
          <br>


          <select class="form-select" name="jam" aria-label="Default select example">
            <option selected>Pilih Jam</option>
            <!-- 2 sks -->
            <option value="07.10-08.40">07.10-08.40</option>
            <option value="08.50-10.20">08.50-10.20</option>
            <option value="10.30-12.00">10.30-12.00</option>
            <option value="13.00-14.30">13.00-14.30</option>
            <option value="14.40-16.10">14.40-16.10</option>
            <!-- 4 sks -->
            <option value="07.10-10.20">07.10-10.20</option>
            <option value="08.50-12.00">08.50-12.00</option>
            <option value="10.30-14.30">10.30-14.30</option>
            <option value="13.00-16.10">13.00-16.10</option>
          </select>
          <br>
          <!-- select end -->


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
        </div>
      </div>
    </form>
    <!-- form input data kelas end -->
  </div>
</div>


<!-- modal tambah kelas end -->

<?= $this->endSection(); ?>