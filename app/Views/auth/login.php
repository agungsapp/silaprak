<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>

<div class="row h-100">
  <div class="col-lg-5 col-12">
    <div id="auth-left">
      <div class="auth-logo">
        <a href="index.html"><img src="<?= base_url(); ?>/dosen/assets/images/logo/logodj.png" style="width: 150px; height: 150px; margin-top: -50px; margin-bottom: -100px;" alt="Logo"></a>
      </div>
      <h2 class="auth-title">Selamat Datang !</h2>
      <p class="auth-subtitle mb-5">SILAPRAK IIB DARMAJAYA</p>
      <?= view('Myth\Auth\Views\_message_block') ?>
      <form action="<?= url_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <!-- validasi email /  username -->
        <?php if ($config->validFields === ['email']) : ?>
          <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" value="<?= old('login'); ?>">
            <div class="form-control-icon">
              <i class="bi bi-envelope"></i>
            </div>
            <div class="invalid-feedback">
              <?= session('errors.login') ?>
            </div>
          </div>
        <?php else : ?>
          <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" value="<?= old('login'); ?>">
            <div class="form-control-icon">
              <i class="bi bi-person"></i>
            </div>
            <div class="invalid-feedback">
              <?= session('errors.login') ?>
            </div>
          </div>
        <?php endif; ?>
        <!-- validasi end -->

        <div class="form-group position-relative has-icon-left mb-4">
          <input type="password" name="password" class="form-control form-control-xl <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" value="<?= old('password'); ?>" autocomplete="off">
          <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
          </div>
          <div class="invalid-feedback">
            <?= session('errors.password') ?>
          </div>
        </div>

        <?php if ($config->allowRemembering) : ?>
          <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" <?php if (old('remember')) : ?> checked <?php endif ?>>
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
              Keep me logged in
            </label>
          </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
      </form>
      <div class="text-center mt-5 text-lg fs-4">
        <?php if ($config->allowRegistration) : ?>
          <p class="text-gray-600">Don't have an account? <a href="<?= url_to('register') ?>" class="font-bold">Sign
              up</a>.</p>
        <?php endif; ?>
        <?php if ($config->activeResetter) : ?>
          <p><a class="font-bold" href="<?= url_to('forgot') ?>">Forgot password?</a>.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">
    </div>
  </div>
</div>
<?= $this->endSection(); ?>