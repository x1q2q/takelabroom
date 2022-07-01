<?= $this->extend('guest/templates/main'); ?>
<?= $this->section('content'); ?>
<section class="pt-7" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-md-start text-center py-6">
                <h1 class="mb-4 fs-9 fw-bold">TakeLabroom</h1>
                <p class="mb-6 lead text-secondary">Laboratorium yang digunakan untuk penelitian ilmiah bervariasi dalam bentuk karena persyaratan yang berbeda untuk spesialis di berbagai bidang sains dan teknik. Laboratorium animasi mungkin berisi komputer dan alat animasi canggih, sementara lab kimia mungkin memiliki peralatan kimia lengkap. dan laboratorium komputer dapat memiliki komputer di atas rata-rata untuk mendukung pembelajaran. S lab menggunakan laboratorium untuk memudahkan masyarakat dan membantu menambah pengetahuan baru tanpa harus mengeluarkan banyak biaya.</p>
                <div><a class="btn btn-warning" href="<?= base_url('member/register'); ?>" role="button">DAFTAR</a></div>
            </div>
            <div class="col-md-4 text-end">
                <center><img class="pt-7 pt-md-0 img-fluid" src="https://i0.wp.com/uns.ac.id/id/wp-content/uploads/logo-uns-biru.png?fit=528%2C526&ssl=1" width="75%" alt="" /></center>
            </div>
        </div>
    </div>
</section>

<section class="pt-5" id="contact">

    <div class="container">
        <div class="row">
            <div class="col-lg-2">,<center><img class="img-fluid" src="member-assets/img/icons/call.png" width="38%" alt="" /></center>
            </div>
            <div class="col-lg-4">
                <br>
                <h4>Telpon dan Whatsapp</h4><br>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="https://wa.me/08123655411">08123655411 (Major)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="https://wa.me/08123655422">08123655422 (Sintara)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="https://wa.me/08123655433">08123655433 (Sludge)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="https://wa.me/08123655444">08123655444 (Astra)</a>
                </div>
            </div>
            <div class="col-lg-2">,<center><img class="img-fluid" src="member-assets/img/icons/mail-outline.png" width="38%" alt="" /></center>
            </div>
            <div class="col-lg-4">
                <br>
                <h4>Email</h4><br>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="mailto: slabsadmin@uns.ac.id">slabsadmin@uns.ac.id (Major)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="mailto: slabssintara@uns.ac.id">slabssintara@uns.ac.id (Sintara)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="mailto: slabssludge@uns.ac.id">slabssludge@uns.ac.id (Sludge)</a>
                </div>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <a class="link-900 text-secondary text-decoration-none" href="mailto: slabsastra@uns.ac.id">slabsastra@uns.ac.id (Astra)</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5" id="validation">

    <div class="container">
        <div class="row">
            <div class="col-lg-2">,<center><img class="img-fluid" src="member-assets/img/icons/location-on.png" width="38%" alt="" /></center>
            </div>
            <div class="col-lg-4">
                <br>
                <h4>Lokasi</h4><br>
                <div class="d-flex align-items-center mb-3"> <img class="me-sm-4 me-2" src="member-assets/img/manager/tick.png" width="25" alt="tick" />
                    <h5 class="fw-medium mb-0 text-secondary">Jl. Ir. Sutami No.36, Kentingan, <br />Kec. Jebres, Kota Surakarta, <br />Jawa Tengah 57126</h5>
                </div>
            </div>
            <div class="col-lg-6">
                <center><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15820.564931360708!2d110.8563871!3d-7.5595759!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbda63b32997616ad!2sUniversitas%20Sebelas%20Maret!5e0!3m2!1sid!2sid!4v1655131942208!5m2!1sid!2sid" width="80%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></center>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection('content'); ?>