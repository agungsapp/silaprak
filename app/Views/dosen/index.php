<?= $this->extend('dosen/template/index'); ?>
<?= $this->section('content'); ?>

<div class="page-heading">
  <h3>Dashboard </h3>
</div>
<div class="page-content">
  <section class="row">
    <div class="col-12 col-lg-9">
      <!-- list info top start -->
      <div class="row">
        <div class="col-6 col-lg-3 col-md-6 ">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon purple mb-2">
                    <i class="iconly-boldShow"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                  <h6 class="text-muted font-semibold ">Data Kelas</h6>
                  <h6 class="font-extrabold mb-0 "><?= $jumlah_kelas ?> Kelas</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 ">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon blue mb-2">
                    <i class="iconly-boldProfile"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold ">Jumlah Mahasiswa</h6>
                  <h6 class="font-extrabold mb-0 "><?= $jumlah_mahasiswa; ?> Mahasiswa</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-6 col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body px-4 py-4-5">
              <div class="row">
                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                  <div class="stats-icon green mb-2">
                    <i class="iconly-boldAdd-User"></i>
                  </div>
                </div>
                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                  <h6 class="text-muted font-semibold">Following</h6>
                  <h6 class="font-extrabold mb-0">80.000</h6>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body px-4 py-4-5">
                    <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                        <div class="stats-icon red mb-2">
                          <i class="iconly-boldBookmark"></i>
                        </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">Saved Post</h6>
                        <h6 class="font-extrabold mb-0">112</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
      </div>
      <!-- list info end -->



    </div>

    <div class="col-12 col-lg-3">
      <div class="card dosen">
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
                <td><span class="badge text-bg-primary">dosen</span></td>
              </tr>
            </tbody>
          </table>
          <a href="index.html" class='btn btn-info'>
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>