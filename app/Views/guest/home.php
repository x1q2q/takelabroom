<?= $this->extend('guest/templates/main'); ?>
<?= $this->section('content'); ?>
<section class="pt-7">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">UNS Laboratorium</h1>
                <p class="mb-6 lead text-secondary">Semua yang diperlukan ada disini<br class="d-none d-xl-block" />reservasi dan amankan laboratoriummu<br class="d-none d-xl-block" /></p>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="#!" role="button">Masuk</a></div>
            </div>
            <div class="col-md-6 text-end">
                <center><img class="pt-7 pt-md-0 img-fluid" src="<?= base_url('member-assets'); ?>/img/hero/hero-img1.png" alt="" /></center>
            </div>
        </div>
    </div>
</section>


<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5 pt-md-9 mb-6" id="feature">

    <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block" style="background-image:url(member-assets/img/category/shape.png);opacity:.5;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <h1 class="fs-9 fw-bold mb-4 text-center"> Tipe Laboratorium <br></h1>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-2">
                <center><img class="mb-4 ms-n3" src="member-assets/img/category/icon5.png" width="75" alt="Feature" />
                    <h4 class="mb-3">Software Engineering</h4>
                </center>
                <br>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <center><img class="mb-4 ms-n3" src="member-assets/img/category/icon6.png" width="75" alt="Feature" />
                    <h4 class="mb-3">Computer Network and Instrumentation</h4>
                </center>
                <br>
            </div>
            <div class="col-lg-4 col-sm-6 mb-2">
                <center><img class="mb-4 ms-n3" src="member-assets/img/category/icon7.png" width="75" alt="Feature" />
                    <h4 class="mb-3">Multimedia Studio</h4>
                </center>
                <br>
            </div>
        </div>
        <div class="text-center"><a class="btn btn-warning" href="#!" role="button">DAFTAR SEKARANG</a></div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="validation">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="text-secondary">Laboratory 1</h5>
                <h2 class="mb-2 fs-7 fw-bold">Sintara</h2>
                <p class="mb-4 fw-medium text-secondary">
                    Sintara dalah laboratorium software engineering yang memiliki alat untuk melakukan pembuatan rekayasa perangkat lunak yang sangat memadai dan memenuhi standart nasional sebuah laboratorium
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">20-30 orang</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Memiliki komputer spesifikasi tinggi</h3>
                </div>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="<?= base_url('lab1'); ?>" role="button">Detail</a></div>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="member-assets/img/validation/validation1.png" alt="" /></div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="manager">

    <div class="container">
        <div class="row">
            <div class="col-lg-6"><img class="img-fluid" src="member-assets/img/manager/manager1.png" alt="" /></div>
            <div class="col-lg-6">
                <h5 class="text-secondary">Laboratorium 2</h5>
                <p class="fs-7 fw-bold mb-2">Sludge</p>
                <p class="mb-4 fw-medium text-secondary">
                    Sludge merupakan laboratorium networking yang memiliki banyak alat-alat dengan basis networking yang sangat menunjang dalam proses penelitian dan proses praktikum,
                    laboratorium ini juga memiliki lisensi berstandar internasional.
                </p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">20-30 orang</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Laboratorium Lisensi International</h3>
                </div>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="<?= base_url('lab2'); ?>" role="button">Detail</a></div>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="marketer">

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="text-secondary">Laboratorium 3</h5>
                <p class="mb-2 fs-8 fw-bold">Astra</p>
                <p class="mb-4 fw-medium text-secondary">Astra adalah laboratorium animasi dan multimedia yang menyediakan komputer dengan spesifikasi tinggi
                    yang berguna untuk mengedit dan membuat animasi dengan standar internasional</p>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">20-30 orang</h3>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="35" alt="tick" />
                    <h3 class="fw-medium mb-0 text-secondary">Komputer spesifikasi tinggi </h3>
                </div>
                <div class="text-center text-md-start"><a class="btn btn-warning me-3 btn-lg" href="<?= base_url('lab3'); ?>" role="button">Detail</a></div>
            </div>
            <div class="col-lg-6"><img class="img-fluid" src="member-assets/img/marketer/marketer1.png" alt="" /></div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-md-11 py-8" id="superhero">

    <div class="bg-holder z-index--1 bottom-0 d-none d-lg-block background-position-top" style="background-image:url(member-assets/img/superhero/oval.png);opacity:.5; background-position: top !important ;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="fw-bold mb-4 fs-7">Butuh Laboratorium ?</h1>
                <p class="mb-5 text-info fw-medium">Apakah Anda memerlukan bantuan untuk proyek Anda: Workshop, konsepsi, pembuatan prototipe, animasi?</p>
                <button class="btn btn-warning btn-md">Pesan Laboratorium</button>
            </div>
        </div>
    </div>
    <!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->




<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="pt-5" id="marketing">

    <div class="container">
        <h1 class="fw-bold fs-6 mb-3">Testimonial</h1>
        <p class="mb-6 text-secondary">Bergabunglah dengan 4000+ orang lain dan dapatkan banyak manfaat dari laboratorium ini</p>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="member-assets/img/marketing/marketing04.jpg" alt="" />
                    <div class="card-body ps-0">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Hasan</a>|<span class="ms-1">19 May 2022</span></p>
                        <h3 class="fw-bold">Meningkatkan Kesejahteraan Dengan Berpikir Positif</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="member-assets/img/marketing/marketing05.jpg" alt="" />
                    <div class="card-body ps-0">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Abdullah</a>|<span class="ms-1">11 May 2022</span></p>
                        <h3 class="fw-bold">Motivasi Adalah Langkah Awal Menuju Kesuksesan</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card"><img class="card-img-top" src="member-assets/img/marketing/marketing06.jpg" alt="" />
                    <div class="card-body ps-0">
                        <p class="text-secondary">By <a class="fw-bold text-decoration-none me-1" href="#">Ibnu</a>|<span class="ms-1">03 May 2022</span></p>
                        <h3 class="fw-bold">Langkah Sukses Untuk Kehidupan Asli atau Bisnis Anda</h3>
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