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
        <div class="card">
          <div class="card-header bg-primary py-3 ">
            <h3 class="text-white fs-4"><?= $kelas['mata_kuliah']; ?></h3>
          </div>
          <div class="card-body">
            <table class="table table-borderless mt-2 fs-5">
              <tbody>
                <tr>
                  <td>Mata Kuliah</td>
                  <td>:</td>
                  <td><?= $kelas['kode_mk']; ?> | <?= $kelas['mata_kuliah']; ?></td>
                </tr>

                <tr>
                  <td>Dosen Pengajar</td>
                  <td>:</td>
                  <td><?= $kelas['first_name']; ?> <?= $kelas['last_name'] ?></td>
                </tr>

                <tr>
                  <td>Hari</td>
                  <td>:</td>
                  <td><?= $kelas['hari']; ?></td>
                </tr>

                <tr>
                  <td>Jam</td>
                  <td>:</td>
                  <td><?= $kelas['jam']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer d-grid gap-md-2">
            <a href="/mahasiswa/masukKelas/<?= $idkel['id_kelas'] . '/' . $kelas['kode_mk']; ?>" class="btn btn-primary fs-5">Kembali</a>
          </div>
        </div>

        <!-- card mata kuliah end -->
        <!-- alert -->
        <div id="deadline" class="d-none"><?= $kelas['deadline']; ?></div>
        <div class="alert alert-light fw-bold" style="border: 2px solid RGBA( 165, 42, 42, .5 );" role="alert">
          PERINGATAN !!!, waktu tersisa untuk mengerjakan laporan ini adalah <div class="d-inline fw-bold text-danger" id="peringatandeadline"></div>
        </div>

        <!-- alert end -->

        <!-- card pengerjaan laporan -->
        <form <?php if ($ava > 0) : ?> action="/mahasiswa/updateLaporan" <?php else : ?> action="/mahasiswa/simpan" <?php endif; ?> method="post">
          <div class="card">
            <div class="card-header bg-primary py-3">
              <h5 class="text-white">Form Laporan Pertemuan <?= $kelas['kode_pertemuan']; ?></h5>
            </div>
            <div class="card-body mt-4">


              <!-- jika sudah ada data sebelumnya -->
              <?php if ($ava > 0) : ?>
                <input type="hidden" name="idlaporan" value="<?= $ava['id_laporan']; ?>">
              <?php endif; ?>
              <!-- skop end -->

              <input type="hidden" name="idmahasiswa" value="<?= user_id() ?>">
              <input type="hidden" name="kodemk" value="<?= $kelas['kode_mk']; ?>">
              <input type="hidden" name="kodepertemuan" value="<?= $kelas['kode_pertemuan']; ?>">
              <input type="hidden" name="idtugas" value="<?= $kelas['id_tugas']; ?>">
              <input type="hidden" name="idkel" value="<?= $idkel['id_kelas']; ?>">
              <textarea name="isilaporan" id="editor"><?php
                                                      if ($ava > 0) {
                                                        echo $ava['isi_laporan'];
                                                      }
                                                      ?>
              </textarea>
              <button id="kumpul" type="submit" name="kumpulkan" class="btn btn-primary fs-5 mt-5">Kumpulkan Laporan</button>
            </div>
          </div>
        </form>
      </div>
      <!-- card pengerjaan laporan end -->

    </div>
</div>
</section>
<!-- Hoverable rows end -->

</div>

<script>
  // button kumpul tugas
  var kumpul_elem = document.getElementById("kumpul");
  // ambil elemen dengan id "deadline" dan "peringatandeadline"
  var deadline_elem = document.getElementById("deadline");
  var peringatan_elem = document.getElementById("peringatandeadline");
  // ambil tanggal dan waktu deadline
  var deadline = new Date(deadline_elem.textContent);
  // panggil fungsi countdown setiap 1 detik
  var countdown = setInterval(function() {
    // hitung selisih waktu antara sekarang dan deadline
    var now = new Date().getTime();
    var selisih_waktu = deadline - now;
    // hitung jumlah hari, jam, menit, dan detik
    var hari = Math.floor(selisih_waktu / (1000 * 60 * 60 * 24));
    var jam = Math.floor((selisih_waktu % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var menit = Math.floor((selisih_waktu % (1000 * 60 * 60)) / (1000 * 60));
    var detik = Math.floor((selisih_waktu % (1000 * 60)) / 1000);
    // tampilkan selisih waktu
    peringatan_elem.innerHTML = hari + " hari " + jam + " jam " + menit + " menit " + detik + " detik ";
    // jika deadline sudah lewat, hentikan countdown
    if (selisih_waktu < 0) {
      clearInterval(countdown);
      peringatan_elem.innerHTML = "Waktu habis";
      kumpul_elem.disabled = true;
    }
  }, 1000);
</script>



<?= $this->endSection(); ?>