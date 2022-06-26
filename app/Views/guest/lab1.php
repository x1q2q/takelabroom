<?= $this->extend('guest/templates/main'); ?>
<?= $this->section('content'); ?>

<section class="pt-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">Sintara</h1>
                <p class="mb-6 lead text-secondary">No matter succeed or fail, I'm proud of every animation I've ever made</p>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#manager" role="button">Get started</a></div>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="<?= base_url('member-assets'); ?>/img/sintara/validation2.png" alt="" /></div>
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
                <center><img class="img-fluid" src="<?= base_url('member-assets'); ?>/img/sintara/c1.png" width="65%" alt="" /></center>
            </div>
            <div class="col-lg-6">
                <h5 class="text-secondary">Easier decision making for</h5>
                <p class="fs-7 fw-bold mb-2">Product In Labs</p>
                <p class="mb-4 fw-medium text-secondary">
                    This laboratory accommodates 20 to 30 students in one class, has tools such as
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Computer with original software</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Headphone Razer Kraken</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Pentab HUION 13</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">30 Camera Nikon D3100</h3>
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
                <h5 class="text-secondary">Easier decision making for</h5>
                <p class="fs-7 fw-bold mb-2">Software Photo Video and Animation</p>
                <p class="mb-4 fw-medium text-secondary">
                    This laboratory has some great software such as
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Adobe Photoshop 2022</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Coreldraw 2022</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Blender</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Toonly Cartoon</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="<?= base_url('member-assets'); ?>/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Adobe Animate</h3>
                </div>
            </div>
            <div class="col-lg-6">,<center><img class="img-fluid" src="<?= base_url('member-assets'); ?>/img/sintara/c2.png" width="65%" alt="" /></center>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>

<?= $this->endSection('content'); ?>