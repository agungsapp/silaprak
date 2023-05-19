<?php

use function PHPUnit\Framework\isNull;
?>
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
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($matkul)) :  ?>
                      <tr>
                        <td class="text-center" colspan="8">- Belum Ada Data Kelas -</td>
                      </tr>
                    <?php else : ?>
                      <?php $i = 1; ?>
                      <?php foreach ($matkul as $mk) : ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="text-bold-500"><?= $mk['kode_mk']; ?></td>
                          <td><?= $mk['mata_kuliah']; ?></td>
                          <td><?= $mk['sks']; ?> SKS</td>
                          <td class="text-bold-500"><?= $mk['hari']; ?></td>
                          <td><?= $mk['jam']; ?></td>
                          <td><?= $mk['status']; ?></td>
                          <td id="aksidaftarkelas">
                            <!-- Button trigger modal edit -->
                            <button type="button" class="btn btn-warning fs-5" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#editKelas<?= $mk['kode_mk']; ?>">
                              <i class="fa-solid fa-pen"></i>
                            </button>
                            <!-- Button trigger modal pop up hapus -->
                            <button type="button" class="fs-5 btn btn-danger fs-5 <?= $mk['jumlah_mahasiswa'] != 0 ? 'disabled' : ''; ?>" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $mk['kode_mk']; ?>">
                              <i class="fa-solid fa-trash-can"></i>
                            </button>

                            <!-- modal hapus -->
                            <div class="modal fade" id="modalDelete<?= $mk['kode_mk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kelas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body p-4">
                                    Yakin ingin menghapus kelas <?= $mk['mata_kuliah']; ?> ?
                                    Setelah menekan tombol <strong>Yakin</strong> tindakan ini tidak dapat di batalkan !
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                    <a href="/dosen/deleteKelas/<?= $mk['kode_mk']; ?>" class="btn btn-primary">Yakin</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal hapus end -->


                            <!-- button masuk kelola kelas -->
                            <a href="/dosen/kelolaKelas/<?= $mk['kode_mk']; ?>" class="fs-5 btn btn-success" style="margin-left: 10px;">Kelola</a>
                          </td>
                        </tr>

                        <!-- Modal edit kelas-->
                        <div class="modal fade" id="editKelas<?= $mk['kode_mk']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <form action="/dosen/updateKelas" method="post">
                              <?= csrf_field(); ?>
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">



                                  <!-- kode mk -->
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="kodemk" id="kode-mk" value="<?= $mk['kode_mk']; ?>" readonly>
                                    <label for="kode-mk">Kode Mata Kuliah</label>
                                  </div>
                                  <br>

                                  <!-- hiden id dosen  -->
                                  <input type="hidden" name="iddosen" value="<?= user()->id; ?>">
                                  <!-- form input nama mk -->
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="namamk" id="matkul" value="<?= $mk['mata_kuliah']; ?>" placeholder="Nama Mata Kuliah">
                                    <label for="matkul">Mata Kuliah</label>
                                  </div>
                                  <br>
                                  <!-- select start -->
                                  <select class="form-select" name="hari" aria-label="Default select example">
                                    <option <?= $mk['hari'] == 'senin' ? 'selected' : ''; ?> value="senin">Senin</option>
                                    <option <?= $mk['hari'] == 'selasa' ? 'selected' : ''; ?> value="selasa">Selasa</option>
                                    <option <?= $mk['hari'] == 'rabu' ? 'selected' : ''; ?> value="rabu">Rabu</option>
                                    <option <?= $mk['hari'] == 'kamis' ? 'selected' : ''; ?> value="kamis">Kamis</option>
                                    <option <?= $mk['hari'] == 'jumat' ? 'selected' : ''; ?> value="jumat">Jumat</option>
                                  </select>
                                  <br>

                                  <select class="form-select" name="sks" aria-label="Default select example">
                                    <option <?= $mk['sks'] = 2 ? 'selected' : ''; ?> value="2">2 SKS</option>
                                    <option <?= $mk['sks'] = 2 ? 'selected' : ''; ?> value="4">4 SKS</option>
                                  </select>
                                  <br>
                                  <select class="form-select" name="jam" aria-label="Default select example">
                                    <option <?= $mk['jam'] == '07.10-08.40' ? 'selected' : ''; ?> value="07.10-08.40">07.10-08.40</option>
                                    <option <?= $mk['jam'] == '08.50-10.20' ? 'selected' : ''; ?> value="08.50-10.20">08.50-10.20</option>
                                    <option <?= $mk['jam'] == '10.30-12.00' ? 'selected' : ''; ?> value="10.30-12.00">10.30-12.00</option>
                                    <option <?= $mk['jam'] == '13.00-14.30' ? 'selected' : ''; ?> value="13.00-14.30">13.00-14.30</option>
                                    <option <?= $mk['jam'] == '14.40-16.10' ? 'selected' : ''; ?> value="14.40-16.10">14.40-16.10</option>
                                    <option <?= $mk['jam'] == '07.10-10.20' ? 'selected' : ''; ?> value="07.10-10.20">07.10-10.20</option>
                                    <option <?= $mk['jam'] == '08.50-12.00' ? 'selected' : ''; ?> value="08.50-12.00">08.50-12.00</option>
                                    <option <?= $mk['jam'] == '10.30-14.30' ? 'selected' : ''; ?> value="10.30-14.30">10.30-14.30</option>
                                    <option <?= $mk['jam'] == '13.00-16.10' ? 'selected' : ''; ?> value="13.00-16.10">13.00-16.10</option>
                                  </select>
                                  <br>
                                  <!-- select end -->


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <!-- modal edit end -->
                      <?php endforeach ?>
                    <?php endif ?>
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