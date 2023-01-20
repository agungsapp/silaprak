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
          <div class="card-header bg-primary py-2 ">
            <h3 class="text-white fs-4">My Profile</h3>
          </div>
          <form action="/dosen/updateProfile" method="post" class="mt-5">
            <?= csrf_field(); ?>
            <div class="card-body">

              <input type="hidden" name="id" value="<?= $dp['id']; ?>">

              <!-- nama depan belakang start -->
              <div class="row g-2">
                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="namadepan" name="namadepan" placeholder="nama depan" value="<?= $dp['firstName']; ?>">
                    <label for="namadepan">Nama depan</label>
                  </div>
                </div>

                <div class="col-md">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="namabelakang" name="namabelakang" placeholder="nama belakang" value="<?= $dp['lastName']; ?>">
                    <label for="namabelakang">Nama belakang</label>
                  </div>
                </div>

              </div>
              <!-- nama depan belakang end -->

              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $dp['username']; ?>">
                <label for="username">Username</label>
              </div>
              <div class="form-floating mt-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" value="<?= $dp['email']; ?>">
                <label for="email">E-mail</label>
              </div>
              <div class="form-floating mt-3">
                <input type="text" class="form-control" id="nip" name="nip" placeholder="nip" value="<?= $dp['npm']; ?>">
                <label for="nip">nip</label>
              </div>


            </div>
            <div class="card-footer text-muted">
              <button type="submit" class="btn btn-success"><i class="fa-solid fa-user-pen"></i> <span class="ms-2 ">Simpan Perubahan</span></button>
            </div>
          </form>
        </div>

        <!-- card mata kuliah end -->

        <!-- card pertemuan -->

        <!-- card pertemuan -->

      </div>
    </div>
  </section>
  <!-- Hoverable rows end -->

</div>


<?= $this->endSection(); ?>