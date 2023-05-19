<?= $this->extend('admin/template/index'); ?>
<?= $this->section('content'); ?>


<div class="page-heading">
  <h3>Dashboard Administrator</h3>
</div>
<div class="page-content">
  <section class="ms-0 ml-lg-2 row px-0">
    <div class="col-12 px-sm-0">
      <div class="col-12 col-lg-9">


        <!-- list info top start -->
        <div class="row">

          <div class="col-6 col-lg-4 col-md-6">
            <div class="card aos-init aos-animate" data-aos="zoom-in">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="stats-icon purple mb-2 d-flex justify-content-center align-items-center">
                      <i class="fa-solid fa-landmark"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 ">
                    <h6 class="text-muted font-semibold ">Data Kelas</h6>
                    <h6 class="font-extrabold mb-0 "><?= $matakuliah; ?> Kelas</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-4 col-md-6 ">
            <div class="card aos-init aos-animate" data-aos="zoom-in">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="stats-icon blue mb-2">
                      <i class="fa-solid fa-person"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold ">Data Mahasiswa</h6>
                    <h6 class="font-extrabold mb-0 "><?= $mahasiswa; ?> Mahasiswa</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-4 col-md-6 ">
            <div class="card aos-init aos-animate" data-aos="zoom-in">
              <div class="card-body px-4 py-4-5">
                <div class="row">
                  <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                    <div class="stats-icon green mb-2">
                      <i class="iconly-boldProfile"></i>
                    </div>
                  </div>
                  <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                    <h6 class="text-muted font-semibold ">Data Dosen</h6>
                    <h6 class="font-extrabold mb-0 "><?= $dosen; ?> Dosen</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>



      </div>
    </div>
</div>
</section>
</div>

<?= $this->endSection(); ?>