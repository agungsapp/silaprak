<?= $this->extend('dosen/template/index'); ?>
<?= $this->section('content'); ?>


<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3 data-aos="zoom-in"><?= $title; ?></h3>
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
          <div class="card-body">
            <table class="table table-borderless mt-3">
              <tr>
                <td>nama</td>
                <td>:</td>
                <td><?= $dp['firstName'] . " " . $dp['lastName'] ?></td>
              </tr>
              <tr>
                <td>username</td>
                <td>:</td>
                <td>@<?= $dp['username']; ?></td>
              </tr>
              <tr>
                <td>e-mail</td>
                <td>:</td>
                <td><?= $dp['email']; ?></td>
              </tr>
              <tr>
                <td>nip</td>
                <td>:</td>
                <td><?= $dp['npm']; ?></td>
              </tr>
            </table>

          </div>
          <div class="card-footer text-muted">
            <a href="/dosen/editProfile/<?= $dp['id']; ?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i> <span class="ms-2 ">Edit Profile</span></a>
          </div>
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