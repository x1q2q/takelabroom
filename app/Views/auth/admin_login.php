<?= $this->extend('auth/base'); ?>

<?= $this->section('extrahead'); ?>
    <title>Admin Login Page</title>
    <meta name="description" content="Login Page PTIKV2" />
<?= $this->endSection('extrahead'); ?>

<?= $this->section('content'); ?>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
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
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-header p-3 bg-primary">
                <div class="app-brand justify-content-center nopadding">
                    <span>
                        <i class='bx bxs-face bx-md text-white'></i>
                    </span>
                    <span class="app-brand-text demo text-white fw-bolder">Admin TakeLabroom</span>
                </div>
                </div>
            <div class="card-body">
                <form id="form-login" class="my-3" action="index.html" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Masukan username"
                    autofocus
                    />
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                    <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100" type="submit">
                        Sign in <span class="tf-icons bx bx-log-in-circle"></span>
                    </button>
                </div>
                </form>
            </div>
            </div>
            <!-- /Register -->
        </div>
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

    <?php if(session()->has('success')): ?>
        <script type="text/javascript">
            var msg = "<?= session("success"); ?>";
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
                let siteUrl = "<?= site_url('admin/dologin'); ?>";
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