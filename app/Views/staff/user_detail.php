<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">staff / data user /</span> Detail User</h4>
    <div class="card">
         <div class="card-header bg-dark">
            <h5 class="mt-2 text-white"><i class="bx bx-sm bxs-detail"></i> Detail User</h5>
        </div>
        <div class="card-body mt-3 pb-0">
            <form id="formAccountSettings">
            <div class="row">
                <div class="mb-3 col-md-6">
                <label for="firstName" class="form-label">Name</label>
                <input class="form-control" type="text" value="<?= $user['name']; ?>" disabled readonly>
                </div>
                <div class="mb-3 col-md-6">
                <label for="lastName" class="form-label">Email</label>
                <input class="form-control" type="text" value="<?= $user['email']; ?>"  disabled readonly>
                </div>
                <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Role</label>
                <input class="form-control" type="text" value="<?= $user['role']; ?>" disabled readonly>
                </div>
                <div class="mb-3 col-md-6">
                <label for="organization" class="form-label">Password</label>
                <input type="text" class="form-control" value="<?= $user['password']; ?>" disabled readonly>
                </div>
            </div>
            </form>
        </div>
        <div class="card-footer mt-0">
            <a href="<?= site_url('staff/user'); ?>" class="btn btn-secondary btn-md rounded-3" title="Detail Data">
            <i class="bx bx-sm bxs-chevron-left"></i> Kembali</a>
        </div>
    </div>
</div>
<style type="text/css">
<?= $this->endSection('content'); ?>