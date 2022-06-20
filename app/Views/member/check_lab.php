<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-2 mb-4 text-capitalize">
        <span class="text-muted fw-light text-lowercase">reservasi /</span>
        <a href="<?= base_url('member/add-reservasi/'); ?>" class="text-primary fw-normal"> Ajukan Reservasi </a> 
        / <?= $category["name_category"]; ?> </h4>
    <!-- Striped Rows -->
    <div class="alert alert-info mx-2 border border-info" role="alert">
        <i class="tf-icons bx bx-sm bx-info-circle"></i>
        Silakan pilih labroom lalu isi form sesuai untuk mengajukan 
        reservasi di laboratorium <?= $category["name_category"]; ?>
    </div>
    <div class="cards">
        <?php foreach($labroom as $val): ?>
            <div class="card card-labroom">
                <div class="card-header border-bottom py-3 bg-dark">
                    <h5 class="card-title text-white nopadding"><?= $val->name_lab; ?></h5>
                </div>
                <div class="card-body py-3 mb-3">
                    <span class="badge rounded-pill bg-secondary">
                        <?= $val->capacity; ?> kursi
                    </span>
                    <span class="badge rounded-pill bg-<?= $val->label_status; ?>">
                    <?= $val->status_lab; ?> today</span>
                    <p class="card-text my-2"><?= $val->desc_lab; ?></p>
                    <div class="fasilitas">
                       <small>Fasilitas : <?= $val->list_facility; ?></small>
                    </div>
                </div>
                <div class="card-footer py-3 border-top">
                    <a href="javascript:void(0)" class="btn btn-dark">
                    Pilih Labroom <i class="tf-icons bx bxs-plus-circle"></i> </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--/ Striped Rows -->
</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-2">
    <div class="card-header bg-primary nopadding row justify-content-between">
        <div class="col py-3">
            <h5 class="text-white nopadding">Riwayat Reservasi <?= $category["name_category"]; ?></h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-reserv">
        <thead>
            <tr>
            <th>No.</th>
            <th>Kode Pinjam</th>
            <th>Ruang Lab</th>
            <th>Peminjam</th>
            <th>Rentang Waktu</th>
            <th>Status</th>
            <th>Tgl Pinjam</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
    </div>
</div>
<style type="text/css">
  .cards {
    display: flex;
    flex-wrap: wrap;
 }
 
.card.card-labroom{
    flex: 1 1 auto;
    box-sizing: border-box;
    margin: .5em;
}
@media screen and (min-width: 40em) {
    .card.card-labroom{
       max-width: calc(50% -  1em);
    }
}
 
@media screen and (min-width: 60em) {
    .card.card-labroom{
        max-width: calc(25% - 1em);
    }
}
.fasilitas{
    border:2px dashed #696cff;
    border-radius: 6px;
    height: 50%;
    padding:2px 6px;
}
.fasilitas small{
    color: #696cff;
}
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
<!-- include script -->
<?= $this->endSection('extrascript'); ?>
