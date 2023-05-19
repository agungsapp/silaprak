<?= $this->extend('mahasiswa/template/index'); ?>
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


        <!-- card mata kuliah end -->


        <!-- card pengerjaan laporan -->

        <div class="card">
          <div class="card-header bg-primary py-3">
            <h5 class="text-white">Form Laporan Pertemuan </h5>
          </div>
          <div class="card-body mt-4">

            <textarea name="isilaporan" id="editorpreview">

            <!-- data mahasiswa -->

            <?php include('headerlaporan.php') ?>
            <hr>

            <figure class="table" style="width:100%; border:none;">
              <table cellspacing="0" cellpadding="0" class="ck-table-resized" style="border:none">
                  <colgroup><col style="width:21.29%;"><col style="width:3.31%;"><col style="width:75.4%;"></colgroup>
                  <tbody>
                  <tr>
                            <td>nama</td>
                            <td>:</td>
                            <td><?= $mhs['firstName']; ?> <?= $mhs['lastName'] ?></td>
                          </tr>

                          <tr>
                            <td>Npm</td>
                            <td>:</td>
                            <td><?= $mhs['npm']; ?></td>
                          </tr>

                          <tr>
                            <td>E-mail</td>
                            <td>:</td>
                            <td><?= $mhs['email']; ?></td>
                          </tr>
                  </tbody>
              </table>
            </figure>
            <!-- data mahasiswa end -->



              <?php foreach ($laporan as $l) : ?>
                <?= $l['isi_laporan'] . "<br>" ?>
                <?php endforeach ?>
              </textarea>
          </div>
        </div>

      </div>
      <!-- card pengerjaan laporan end -->

    </div>
</div>
</section>
<!-- Hoverable rows end -->

</div>



<?= $this->endSection(); ?>