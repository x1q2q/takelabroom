<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>S Labs</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('member-assets'); ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('member-assets'); ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('member-assets'); ?>/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://i0.wp.com/uns.ac.id/id/wp-content/uploads/logo-uns-biru.png?fit=528%2C526&ssl=1">
    <link rel="manifest" href="<?= base_url('member-assets'); ?>/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="member-assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->

    <link href="<?= base_url('member-assets'); ?>/css/theme.css" rel="stylesheet" />

</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?= $this->include('guest/templates/navbar'); ?>

        <?= $this->renderSection('content'); ?>
        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <?= $this->include('guest/templates/footer'); ?>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <iframe class="rounded" style="width:100%;height:500px;" src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url('assets/vendor/libs/@popperjs/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/is/is.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/fontawesome/all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/libs/@popperjs/popper.min.js'); ?>"></script>
    <script src="<?= base_url('member-assets/js/theme.js'); ?>"></script>




    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>

    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
</body>

</html>