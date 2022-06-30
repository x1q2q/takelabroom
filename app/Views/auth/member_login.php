<?= $this->extend('auth/base'); ?>

<?= $this->section('extrahead'); ?>
    <title>Login Page</title>
    <meta name="description" content="Login Page PTIKV2" />
<?= $this->endSection('extrahead'); ?>

<?= $this->section('content'); ?>
<div class="authentication-wrapper authentication-cover">
  <div class="bs-toast toast toast-placement-ex top-0 end-0 m-3 sld-down"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
      data-delay="2000"
      id="toast-alert">
      <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold toast-title"></div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body"></div>
  </div>
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5 bg-info">
      <div class="w-100 d-flex justify-content-center">
        <img src="<?= site_url('assets/img/illustrations/girl-doing-yoga-light.png'); ?>" class="img-fluid" alt="Login image" 
          width="700">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <h4 class="mb-2">Selamat datang di TakeLabRoom! 👋</h4>
        <p>Silakan masuk untuk bisa melakukan reservasi di LabRoom PTIK</p>
        <hr>
        <form id="form-login" class="mb-3" 
          action="" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email anda" autofocus>
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
              <a href="<?= site_url('member/forgot-password'); ?>">
                <small>Lupa Password?</small>
              </a>
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" 
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autocomplete>
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me">
              <label class="form-check-label" for="remember-me">
                Remember Me
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-info w-100">
            Masuk <span class="tf-icons bx bx-log-in-circle"></span>
          </button>
        </form>

        <p class="text-center">
          <span>Belum memiliki akun? </span>
          <a href="<?= site_url('member/register'); ?>">
              <span>Daftar di sini</span>
          </a>
        </p>

        
        </div>
      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
<?= $this->endSection('content'); ?>
<?= $this->section('extrascript'); ?>
    <?php if(session()->has('error')): ?>
        <script type="text/javascript">
            var msg = "<?= session("error"); ?>";
            showToast('danger','Peringatan',msg,'#toast-alert');
        </script>
    <?php endif; ?>

    <?php if(session()->has('successRegister')): ?>
        <script type="text/javascript">
            var msg = "<?= session("successRegister"); ?>";
            showToast('success','Sukses',msg,'#toast-alert');
        </script>
    <?php endif; ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': tokenHash
            }
        });
        $(document).ready(function() {
          $('#form-login').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('member/dologin'); ?>";
                let formData = new FormData(this);
                resetValidationError('#form-login'); // agar bisa mengambil kondisi field terbaru
                $.ajax({
                    type: $(this).attr('method'),
                    url: siteUrl,
                    data:formData,
                    processData:false,
                    contentType:false,
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        var data = resp.data;
                        if(parseInt(resp.status) == 200){
                          showToast('success','Login Berhasil','Sedang mengalihkan halaman ...','#toast-alert');
                          window.location.href=resp.message;
                        }else{
                            for(const val in data){
                                const inputTag = 'form#form-login'+' #'+val;
                                $(inputTag).addClass('is-invalid');
                                if(!$(inputTag).parent().find('.invalid-feedback').length){
                                    $(inputTag).parent().append(
                                        `<div class="invalid-feedback">${data[val]} </div>`);
                                    }                     
                            }
                            showToast('warning','Peringatan',resp.message,'#toast-alert');
                        }
                    },error: function(){
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                    }
                });
            });
          });
        </script>
<?= $this->endSection('extrascript'); ?>