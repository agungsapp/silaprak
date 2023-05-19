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

  <!-- Hoverable rows start -->
  <section class="section">
    <div class="row" id="table-hover-row">
      <div class="col-12">
        <div class="card">
          <div class="card-header border py-3 bg-primary">
            <h3 class="text-light">Time Settings</h3>
          </div>
          <div class="card-body border rounded-bottom">
            <!-- <div class="col-12 col-md-3">

              <form action="/admin/simpanWaktu" method="post">
                
                <div class="input-group mt-4 mb-3">
                  <input type="time" class="form-control" id="jam" name="jam" min="07:00" max="21:00" aria-describedby="button-addon2">
                  <button class="btn btn-primary" type="submit" id="button-addon2">Tambah</button>
                </div>
              </form>
            </div> -->
            <form action="/admin/simpanWaktu" method="post">
              <?php

              use function PHPUnit\Framework\isEmpty;

              csrf_field() ?>
              <div class="input-group mb-3 mt-4">
                <input type="time" class="form-control <?= $validation->hasError('jam1') ? "is-invalid" : ""; ?>" id="jam1" name="jam1" min="07:00" max="21:00">
                <span class="input-group-text"><button class="btn btn-primary" type="submit" id="button-addon1">Tambah</button></span>
                <input type="time" class="form-control  <?= $validation->hasError('jam2') ? "is-invalid" : ""; ?>" id="jam2" name="jam2" min="07:00" max="21:00">
                <div class="invalid-feedback mt-2">
                  <?= $validation->getError('jam1'); ?>
                </div>
                <div class="invalid-feedback mt-2">
                  <?= $validation->getError('jam2'); ?>
                </div>
              </div>
            </form>


            <table class="table mt-2">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Waktu</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ?>

                <?php if (!empty($time)) : ?>
                  <?php foreach ($time as $t) : ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></th>
                      <td><?= $t['jam1'] . "-" . $t['jam2']; ?></td>
                      <td>
                        <!-- Button trigger modal edit -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $t['id']; ?>">
                          <i class="fa-solid fa-pen"></i>
                        </button>
                        <!-- Button trigger modal hapus -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $t['id']; ?>">
                          <i class="fa-solid fa-trash"></i>
                        </button>


                        <!-- Modal edit -->
                        <div class="modal fade" id="modalEdit<?= $t['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jam Kuliah</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="/admin/updateJam" method="post">
                                <?php csrf_field() ?>
                                <div class="modal-body">
                                  <input type="text" name="id" id="id" value="<?= $t['id']; ?>">
                                  <input type="time" class="form-control <?= $validation->hasError('jam1') ? "is-invalid" : ""; ?>" id="jam1" name="jam1" min="07:00" max="21:00" value="<?= $t['jam1']; ?>">
                                  <input type="time" class="form-control  <?= $validation->hasError('jam2') ? "is-invalid" : ""; ?>" id="jam2" name="jam2" min="07:00" max="21:00" value="<?= $t['jam2']; ?>">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                        <!-- Modal delete -->
                        <div class="modal fade" id="modalHapus<?= $t['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Jam</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                yakin ingin menghapus jam <strong><?= $t['jam1'] . "-" . $t['jam2']; ?></strong> dari database jam perkuliahan?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="/admin/deleteJam/<?= $t['id']; ?>" class="btn btn-primary">Yakin</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach ?>
                <?php else : ?>
                  <tr>
                    <td colspan="4" class="text-center"> -- Belum Ada Data -- </td>
                  </tr>
                <?php endif; ?>


              </tbody>
            </table>

          </div>
        </div>
      </div>
  </section>

  <!-- <section class="section">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header border py-3">
            <h3>Kode Kelas Settings</h3>
          </div>
          <div class="card-body border">
            <div class="col-12 col-md-6">
              <div class="input-group mb-3 mt-4">
                <input type="text" class="form-control" placeholder="Input Kode Kelas" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-success" type="button" id="button-addon2">Tambah Kode</button>
              </div>
            </div>
            <table class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>


<!-- noted buatkan method save untuk form input jam -->