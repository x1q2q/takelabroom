<?= $this->extend('auth/base'); ?>

<?= $this->section('extrahead'); ?>
    <title>Register Page</title>
    <meta name="description" content="Register Page TakeLabRoom" />
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
    <div class="d-none d-lg-flex col-lg-6 col-xl-8 align-items-center p-5 bg-info">
      <div class="w-100 d-flex justify-content-center">
        <img src="<?= base_url('assets/img/backgrounds/register-bg.png'); ?>" class="img-fluid" alt="Login image" width="700">
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Register -->
    <div class="d-flex col-12 col-lg-6 col-xl-4 align-items-center authentication-bg p-sm-4 p-3">
      <div class="mx-auto">
        <!-- /Logo -->
        <h4 class="mb-2">Daftarkan diri anda di sini 🚀</h4>
        <p class="mb-4">Membuat reservasi labroom PTIK anda lebih mudah!</p>
        <hr>
        <form id="form-register" class="mb-3" 
          action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="full_name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="full_name" name="full_name" 
            placeholder="Masukkan nama lengkap kamu" autofocus>
          </div>
          <div class="row">
            <div class="mb-3 col">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" 
              placeholder="Masukkan username  ">
            </div>
            <div class="mb-3 col">
              <label for="nim" class="form-label">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim" 
              placeholder="K351xxx">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control form-select">
                  <option value="">pilih salah satu</option>
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col">
              <label for="notelp" class="form-label">No.Telp</label>
              <input type="text" class="form-control" id="notelp" name="notelp" 
              placeholder="08xxxxx">
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" 
            placeholder="Masukkan email kamu">
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">
            Registrasi <span class="tf-icons bx bxs-send"></span>
          </button>
        </form>

        <p class="text-center">
          <span>Sudah memiliki akun?</span>
          <a href="<?= site_url('member/login'); ?>">
            <span>Masuk di sini</span>
          </a>
        </p>

      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
<?= $this->endSection('content'); ?>
<?= $this->section('extrascript'); ?>
      <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': tokenHash
            }
        });
        $(document).ready(function() {
          $('#form-register').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('member/doregister'); ?>";
                let formData = new FormData(this);
                resetValidationError('#form-register'); // agar bisa mengambil kondisi field terbaru
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
                          window.location.href=resp.message;
                        }else{
                            for(const val in data){
                                const inputTag = 'form#form-register'+' #'+val;
                                $(inputTag).addClass('is-invalid');
                                if(!$(inputTag).parent().find('.invalid-feedback').length){
                                    $(inputTag).parent().append(
                                        `<div class="invalid-feedback">${data[val]} </div>`);
                                    }                     
                            }
                            showToast('danger','Peringatan',resp.message,'#toast-alert');
                        }
                    },error: function(){
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                    }
                });
            });
          });
        </script>
<?= $this->endSection('extrascript'); ?>