<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-3 mb-4"><span class="text-muted fw-light">
        reservasi /</span> Profil Saya </h4>
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
        <form id="form-save" method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" id="id_user" name="id_user" value="<?= $userProfile['id_user']; ?>"/>
        <div class="card mb-4">
            <h5 class="card-header">Detail Profil</h5>
            <!-- Account -->
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <?php if($userProfile['thumb_user'] != '' && $userProfile['thumb_user'] != null){ ?>
                        <img src="<?= site_url('assets/img/uploads/users/'.$userProfile['thumb_user']); ?>" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar">        
                    <?php }else{ ?>
                        <img src="<?= site_url('assets/img/avatars/user1.jpg'); ?>" alt="user-avatar" class="d-block rounded img-fluid" id="uploadedAvatar">
                        <?php } ?>
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-2" tabindex="0">
                        <span class="d-none d-sm-block">Ganti Foto Profil</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" name="foto_profile" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                            <input type="text" value="<?= $userProfile['thumb_user']; ?>" 
                                name="profile_file_name" class="form-control" hidden id="profile-file-name">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-2">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Clear</span>
                        </button>
                        <p class="text-muted mb-0">File harus berupa jpg/jpeg/png & Tidak boleh melebihi batas 2Mb</p>
                        <div id="foto_profile"></div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input class="form-control" type="text" id="username" name="username" value="<?= $userProfile['username']; ?>" autofocus="">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" name="full_name" id="full_name" value="<?= $userProfile['full_name']; ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input class="form-control" type="text" id="email" readonly disabled
                            name="email" value="<?= $userProfile["email"]; ?>" placeholder="john.doe@example.com">
                            <small> *untuk mengubah email, harap hubungi admin</small>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="type_user" class="form-label">Tipe Member</label>
                        <input type="text" class="form-control" id="type_user" readonly disabled
                            name="type_user" value="<?= $userProfile["type_user"]; ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control form-select">
                            <option value="laki-laki"
                                <?= ($userProfile["gender"] == 'laki-laki') ? 'selected' : '' ; ?>
                            >Laki-laki</option>
                            <option value="perempuan"
                                <?= ($userProfile["gender"] == 'perempuan') ? 'selected' : '' ; ?>
                            >Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="notelp" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $userProfile["notelp"]; ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input class="form-control" type="text" id="nim" name="nim" value="<?= $userProfile["nim"]; ?>">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="created_at" class="form-label">Tanggal Registrasi</label>
                        <input type="text" class="form-control" id="created_at" disabled readonly
                        name="created_at" value="<?= $userProfile["created_at"]; ?>">
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success me-2">Simpan Perubahan
                     <span class="tf-icons bx bxs-check-circle"></span>
                    </button>
                    
                </div>
            </div>
            <!-- /Account -->
        </div>
    </form>
    <!--/ Striped Rows -->
</div>
<style type="text/css">
    #uploadedAvatar{
        max-width: 160px;
    }
</style>
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
    var imgBefore = "<?= $userProfile["thumb_user"]; ?>";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': tokenHash
        }
    });
    $(document).ready(function(){
        const deactivateAcc = document.querySelector('#formAccountDeactivation');
        let accountUserImage = document.getElementById('uploadedAvatar');
        const fileInput = document.querySelector('.account-file-input'),
        resetFileInput = document.querySelector('.account-image-reset');
    
        if (accountUserImage) {
        const resetImage = accountUserImage.src;
        fileInput.onchange = () => {
            let file = fileInput.files[0]
            if (fileInput.files[0]) {
                let ukuran = file.size;
                let name = file.name;
                let type = file.type;
                var allowtypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if(jQuery.inArray(type, allowtypes) >= 0 && ukuran <= 2000000){
                    $('#profile-file-name').val(name);
                    accountUserImage.src = window.URL.createObjectURL(file);
                }else{
                    if(jQuery.inArray(type, allowtypes) < 0) {
                        $('#profile-file-name').val(imgBefore);
                        showToast('warning','Peringatan','Tipe file tidak diijinkan!','#toast-alert');
                    }else if(ukuran > 2000000){
                        $('#profile-file-name').val(imgBefore);
                        showToast('warning','Peringatan','File tidak boleh lebih dari 2MB','#toast-alert');
                    }
                }
            }
        };
            resetFileInput.onclick = () => {
                fileInput.value = '';
                accountUserImage.src = resetImage;
                $('#profile-file-name').val(imgBefore);
            };
        }

        $('#form-save').submit(function(e){
            e.preventDefault();
            let siteUrl = "<?= site_url('member/my-profile/update'); ?>";
            let formData = new FormData(this);
            resetValidationError(); // agar bisa mengambil kondisi field terbaru
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
                        location.reload();
                    }else{
                        for(const val in data){
                            const inputTag = 'form#form-save'+' #'+val;
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
<!-- include script -->
<?= $this->endSection('extrascript'); ?>
