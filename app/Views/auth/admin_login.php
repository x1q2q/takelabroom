<?= $this->extend('auth/base'); ?>

<?= $this->section('extrahead'); ?>
    <title>Admin Login Page</title>
    <meta name="description" content="Login Page PTIKV2" />
<?= $this->endSection('extrahead'); ?>

<?= $this->section('content'); ?>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
            <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                    <span>
                        <i class='bx bxs-user-pin bx-md'></i>
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder">Admin Panel</span>
                </div>
                <form id="formAuthentication" class="my-3" action="index.html" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email-username"
                    placeholder="Enter your email"
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
                    <button class="btn btn-danger d-grid w-100" type="submit">Sign in</button>
                </div>
                </form>
            </div>
            </div>
            <!-- /Register -->
        </div>
        </div>
    </div>
<?= $this->endSection('content'); ?>