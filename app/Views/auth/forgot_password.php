<?= $this->extend('auth/base'); ?>

<?= $this->section('extrahead'); ?>
    <title>Forgot Password</title>
    <meta name="description" content="Forgot Password TakeLabRoom" />
<?= $this->endSection('extrahead'); ?>

<?= $this->section('content'); ?>
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">

    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
      <div class="w-100 d-flex justify-content-center">
        <img src="<?= site_url('assets/img/backgrounds/forgot-password-bg.png'); ?>" 
        class="img-fluid" alt="Forgot Password" width="600" >
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Forgot Password -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand mb-5">
              <span>
                  <i class='bx bxs-face bx-md text-primary'></i>
              </span>
              <span class="app-brand-text demo text-body fw-bolder ml-2">Member Area</span>
      </div>
        <!-- /Logo -->
        <h4 class="mb-2">Lupa Password? 🔒</h4>
        <p class="mb-4">Masukkan email kamu dan kami ikut perintah selanjutnya untuk mereset password</p>
        <form id="formAuthentication" class="mb-3" action="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-6/auth/reset-password-cover" method="GET">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" 
            placeholder="Masukan email kamu" autofocus>
          </div>
          <button class="btn btn-primary d-grid w-100">Kirimkan Link Reset</button>
        </form>
        <div class="text-center">
          <a href="<?= site_url('member/login'); ?>">
            <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
            Kembali ke login
          </a>
        </div>
      </div>
    </div>
    <!-- /Forgot Password -->
  </div>
</div>
<!--/ Content -->
<?= $this->endSection('content'); ?>