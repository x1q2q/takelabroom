<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">staff / data user /</span> Edit User</h4>
    <div class="card">
         <div class="card-header bg-secondary">
            <h5 class="mt-2 text-white"> <i class="bx bx-sm bxs-pencil"></i> Edit User</h5>
        </div>
        <div class="card-body mt-3">
            <form id="formAccountSettings" method="POST" 
            action="<?= site_url('staff/user/doUpdate/'.$user['id_user']); ?>">
            <div class="row">
                <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" id="name" name="name" 
                value="<?= $user['name']; ?>">
                </div>
                <div class="mb-3 col-md-6">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="text" name="email" id="email" 
                value="<?= $user['email']; ?>" >
                </div>
                <div class="mb-3 col-md-6">
                <label for="role" class="form-label">Role</label>
                <input class="form-control" type="text" id="role" name="role" 
                value="<?= $user['role']; ?>">
                </div>
                <div class="mb-3 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" 
                value="<?= $user['password']; ?>">
                </div>
            </div>
            <hr>
            <div class="mt-0">
              <a href="<?= site_url('staff/user'); ?>" class="btn btn-outline-secondary btn-md rounded-3" title="Detail Data">
              Cancel </a>
              <button type="submit" class="btn btn-warning btn-md rounded-3" title="Detail Data">
              Simpan Perubahan <i class="bx bx-sm bx-refresh"></i> </button>
            </div>
            </form>
        </div>
    </div>
</div>
<style type="text/css">
<?= $this->endSection('content'); ?>