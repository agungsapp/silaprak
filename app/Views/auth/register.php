<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>

<div class="row h-100">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <div class="auth-logo">
        <a href="index.html"><img src="<?= base_url(); ?>/dosen/assets/images/logo/logodj.png" style="width: 150px; height: 150px; margin-top: -50px; margin-bottom: -100px;" alt="Logo"></a>
      </div>
      <h2 class="auth-title">Daftar</h2>
      <p class="auth-subtitle mb-5">Lengkapi data anda untuk menyelesaikan proses pendaftaran.</p>

      <?= view('Myth\Auth\Views\_message_block') ?>

      <form action="<?= url_to('register') ?>" method="post">
        <?= csrf_field() ?>
        <!-- email -->
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" class="form-control form-control-xl <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
          <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
          </div>
        </div>
        <!-- username -->
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" class="form-control form-control-xl <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
          <div class="form-control-icon">
            <i class="bi bi-input-cursor"></i>
          </div>
        </div>
        <!-- fistname dan lastname -->
        <div class="row">
          <div class="col-lg-12 d-flex justify-content-around">
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl <?php if (session('errors.firstName')) : ?>is-invalid<?php endif ?>" name="firstName" placeholder="Nama depan" value="<?= old('fistName') ?>">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>

            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl <?php if (session('errors.lastName')) : ?>is-invalid<?php endif ?>" name="lastName" placeholder="Nama belakang" value="<?= old('lastName') ?>">
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- fistname lastname end -->

        <div class="form-group position-relative has-icon-left mb-4">
          <input type="text" class="form-control form-control-xl <?php if (session('errors.npm')) : ?>is-invalid<?php endif ?>" name="npm" placeholder="Npm" value="<?= old('npm') ?>">
          <div class="form-control-icon">
            <i class="bi bi-input-cursor"></i>
          </div>
        </div>

        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password" class="form-control form-control-xl <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="pass_confirm" class="form-control form-control-xl <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.pass_confirm') ?>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
      </form>
      <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Sudah punya akun? <a href="<?= url_to('login') ?>" class="font-bold">Log
            in</a>.</p>
      </div>
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">

    </div>
  </div>
</div>

<?= $this->endSection(); ?>