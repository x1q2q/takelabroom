<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">staff / data user /</span> Tambah User</h4>
    <div class="card">
         <div class="card-header bg-dark">
            <h5 class="mt-2 text-white"><i class="bx bx-sm bxs-plus-circle"></i> Tambah User</h5>
        </div>
        <div class="card-body mt-3">
            <form id="formAccountSettings" method="POST" action="<?= site_url('staff/user/doAdd'); ?>">
            <div class="row">
                <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Masukkan nama ...">
                </div>
                <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Masukkan email ...">
                </div>
                <div class="mb-3 col-md-6">
                <label for="role" class="form-label">Role</label>
                <input class="form-control" type="text" id="role" name="role" placeholder="Masukkan role ...">
                </div>
                <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password ...">
                </div>
            </div>
            <div class="mt-0">
                <button type="submit" class="btn btn-dark btn-md rounded-3" title="Detail Data">
                <i class="bx bx-sm bxs-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<style type="text/css">
<?= $this->endSection('content'); ?>