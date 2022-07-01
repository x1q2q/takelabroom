<?= $this->extend('guest/templates/main'); ?>
<?= $this->section('content'); ?>

<section class="pt-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">Sludge</h1>
                <p class="mb-6 lead text-secondary">Ada sesuatu tentang kelas kimia<br class="d-none d-xl-block" />yang muncul pikiran di otak saya untuk mulai bekerja.</p>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#manager" role="button">Mulai</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="<?= base_url('member-assets'); ?>/img/sludge/manager1.png" alt="" /></div>
        </div>
    </div>
</section>

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="manager">
    <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(<?= base_url('member-assets'); ?>/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <center><img class="img-fluid" src="<?= base_url('member-assets'); ?>/img/sludge/c1.png" width="65%" alt="" /></center>
            </div>
            <div class="col-lg-6">
                <h5 class="text-secondary">Fitur 1</h5>
                <p class="fs-7 fw-bold mb-2">Produk dalam Laboratorium</p>
                <p class="mb-4 fw-medium text-secondary">
                    Laboratorium ini menampung 20 hingga 30 siswa dalam satu kelas, memiliki alat-alat seperti:
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Kursi Lab</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Komputer Standar Atas</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 LAN</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Wifi 100mbps</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Etc</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->


<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="validation">
    <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(<?= base_url('member-assets'); ?>/img/category/shape.png);opacity:.5;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="text-secondary">Fitur 2</h5>
                <p class="fs-7 fw-bold mb-2">Alat Praktek Network</p>
                <p class="mb-4 fw-medium text-secondary">
                    Alat praktek yang ada di laboratorium antara lain:
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">90 RJ45</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">90 Router</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Switch</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Bridge</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">60 Modem</h3>
                </div>
            </div>
            <div class="col-lg-6">,<center><img class="img-fluid" src="<?= base_url('member-assets'); ?>/img/sludge/c2.png" width="65%" alt="" /></center>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>

<?= $this->endSection('content'); ?>