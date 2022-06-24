<?= $this->extend('guest/templates/main'); ?>
<?= $this->section('content'); ?>

<section class="pt-5" id="marketing">

    <div class="container">
        <center>
            <h1 class="fw-bold fs-6 mb-3">Kategori Laboratorium</h1>
        </center>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card"><a class="navbar-brand" href="#"><img class="card-img-top" src="member-assets/img/marketing/marketing04.jpg" alt="" />
                        <div class="card-body ps-0">
                            <p class="text-secondary">- <a class="fw-bold text-decoration-none me-1" href="home">Chemical</a><span class="ms-1">is adorable</span></p>
                            <h3 class="fw-bold">Sintara</h3>
                        </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card"><a class="navbar-brand" href="#"><img class="card-img-top" src="member-assets/img/marketing/marketing05.jpg" alt="" />
                        <div class="card-body ps-0">
                            <p class="text-secondary">- <a class="fw-bold text-decoration-none me-1" href="#">Computer</a><span class="ms-1">for better world</span></p>
                            <h3 class="fw-bold">Sludge</h3>
                        </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card"><a class="navbar-brand" href="#"><img class="card-img-top" src="member-assets/img/marketing/marketing06.jpg" alt="" />
                        <div class="card-body ps-0">
                            <p class="text-secondary">- <a class="fw-bold text-decoration-none me-1" href="#">Animation</a><span class="ms-1">for everyone</span></p>
                            <h3 class="fw-bold">Astra</h3>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->
<?= $this->endSection('content'); ?>