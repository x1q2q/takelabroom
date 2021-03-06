<?= $this->extend('member/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/timepicker/jquery.timepicker.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-2 mb-4 text-capitalize">
        <span class="text-muted fw-light text-lowercase">reservasi /</span>
        <a href="<?= base_url('member/add-reservation/'); ?>" class="text-primary fw-normal"> Ajukan Reservasi </a> 
        / <?= $category["name_category"]; ?> 
    </h4>
    <div class="bs-toast toast toast-placement-ex top-0 end-0 m-3 sld-down"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-delay="2000"
        id="toast-alert">
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold toast-title"></div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body"></div>
    </div>
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
                    <span class="badge rounded-pill bg-info">
                        <?php if($type_user == 'civitas'){ ?>
                            Rp.0 
                        <?php }else if($type_user == 'non-civitas'){ ?>
                            Rp. <?= number_format($val->harga_total, 0, ",", ".") .' / 30 menit'; ?>
                        <?php } ?>
                    </span>
                    <p class="card-text my-2"><?= $val->desc_lab; ?></p>
                    <div class="fasilitas">
                       <small>Fasilitas : <?= $val->list_facility; ?></small>
                    </div>
                </div>
                <div class="card-footer py-3 border-top">
                    <button onclick="chooseLabroom('<?= $val->id_lab; ?>','<?= $val->name_lab; ?>',
                    '<?= $type_user?>','<?= $val->harga_lab; ?>')" 
                    class="btn btn-dark"> Pilih  Labroom 
                    <i class="tf-icons bx bxs-plus-circle"></i> 
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!--/ Striped Rows -->
</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mx-2">
    <div class="card-header bg-secondary nopadding row justify-content-between">
        <div class="col py-3">
            <h5 class="text-white nopadding">Riwayat Reservasi <?= $category["name_category"]; ?></h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-reserv">
        <thead>
            <tr>
            <th>No.</th>
            <th>Ruang Lab</th>
            <th>Peminjam</th>
            <th>Rentang Waktu</th>
            <th>Status</th>
            <th>Tgl Pinjam</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
    </div>
</div>
<!-- modal save -->
<div class="modal fade" id="modal-reservasi" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog sld-up modal-lg" role="document">
    <form action="" method="POST" id="form-save" class="modal-content" 
        tipe="" enctype="multipart/form-data">
        <input type="hidden" id="id_lab" name="id_lab"/>
        <input type="hidden" id="harga_sewa" name="harga_sewa"/>
        <input type="hidden" id="total_payment" name="total_payment"/>
            <div class="modal-header border-bottom">
                <h5 class="modal-title">Pengajuan Reservasi <?= $category["name_category"]; ?></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-4 pb-0">
                <div id="notif-alert"></div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="name_lab" class="form-label">Lab Terpilih</label>
                    <input type="text" class="form-control" id="name_lab" name="name_lab" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="tgl_pakai" class="form-label">Tanggal Pakai</label>
                    <input type="date" class="form-control" id="tgl_pakai" 
                    name="tgl_pakai">
                </div>
                <div class="row nopadding">
                    <div class="col-6">
                        <label for="time_start" class="form-label">Waktu Mulai</label>
                        <input type="text" class="form-control timepicker" id="time_start" 
                        name="time_start" placeholder="07:00">
                    </div>
                    <div class="col-6">
                        <label for="time_end" class="form-label">Waktu Selesai</label>
                        <input type="text" class="form-control timepicker" id="time_end" 
                        name="time_end" placeholder="21:00">
                    </div>
                </div>
                <div class="pt-3 px-3 mt-3 border-top" id="payment" style="display: none;">
                    <label class="form-label">Rincian Harga Sewa</label>
                    <div class="order-payment">
                        <div class="m-1 row nopadding">
                            <label for="code" class="col text-left">Harga Sewa</label>
                            <div class="col-auto text-right">
                                <span class="harga-sewa">Rp.0</span> / menit
                            </div>
                        </div>
                        <div class="m-1 row nopadding border-top">
                            <label for="code" class="col text-left">Total Harga Sewa</label>
                            <div class="col-auto text-right">
                                (<span class="harga-sewa">Rp.0</span> 
                                x <span id="interval-menit">0</span> menit) = <span id="total-payment">Rp.0</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            <div class="modal-footer py-4 px-2">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-success" id="btn-save">Reservasi 
                    <span class="tf-icons bx bx-send"></span>
                </button>
            </div>
        </div>
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
.order-payment{
    border:2px dashed #ffab00;
    border-radius: 6px;
    background:#f2f2f2;
}
.order-payment .row{
    padding:6px 5px!important;
}
.fasilitas small{
    color: #696cff;
}
button.btn-alert{
    transform: translate(0,0)!important;
    background-color: transparent!important;
    box-shadow: none !important;
}
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <?= script_tag('assets/vendor/libs/timepicker/jquery.timepicker.min.js'); ?>
    <?= script_tag('assets/vendor/libs/moment/moment.min.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
        
            $('input.timepicker').timepicker({
                zindex:1090,
                timeFormat: 'HH:mm',
                minTime: new Date(0, 0, 0, 7, 0, 0),
                maxTime: new Date(0, 0, 0, 21, 0, 0),
                startTime: new Date(0, 0, 0, 7, 0, 0),
                interval: 10,
                scrollbar:true,
                change: calcPaymentTotal
            });
            var reservTable = $('#datatable-reserv').DataTable({
                "defRender":true,
                "searching": false,
                "language": {
                    "emptyTable": "Belum ada riwayat reservasi",
                    "zeroRecords": "Belum ada riwayat reservasi"
                },
                "dom": '<"wrapper m-2 bg-label-secondary p-1"lf>rt<"wrapper rounded-3 bg-label-dark"<i><"row align-items-center"<""><p>>>',
                "processing": true,
                "serverSide": true,
                "order": [
                    [0, "desc"]
                ],
                "aLengthMenu": [[5, 15, 30],[ 5, 15, 30]],
                "columns": [
                    {
                        "data": "id_reserv",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'name_lab',
                        'className': "text-center",
                        'orderable': true,
                    },
                    {
                        'data': 'full_name',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `${data}<br/>(${row.type_user})`;
                        }
                    },
                    {
                        'data': 'time_start',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `(${row.time_start} - ${row.time_end})<br/> ${row.date_booking}`;
                        }
                    },
                    {
                        'data': 'status_reserv',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 'cancelled') ? 'danger' : (data == 'finished') 
                                ? 'primary': (data == 'verified') ? 'success' : 'warning' ;
                            let label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;

                            return label;
                        }
                    },
                    {
                        'data': 'created_at',
                        'className': "text-left",
                        'orderable': false,
                    }
                ],
                "ajax": {
                    "url": "<?php echo site_url('member/my-reservation/getdata/category_id/'.$category['id_category']); ?>",
                    "type": "POST",
                    'data': function(data) {
                        var dataLabId = "<?= $data_labid; ?>";
                        data.csrf_token_name = tokenHash;
                        data.lab_id = JSON.parse(dataLabId);
                    }
                }
            });
            reservTable.on('draw', function () {
                var total_records = reservTable.rows().count();
                var page_length = reservTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = reservTable.page.info().page+1;
            });

            $('#form-save').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('member/my-reservation'); ?>";
                let formData = new FormData(this);
                let idLab = $('#form-save').find('#id_lab').val();
                let urlPost =  `${siteUrl}/insert`;
                resetValidationError(); // agar bisa mengambil kondisi field terbaru
                $.ajax({
                    type: $(this).attr('method'),
                    url: urlPost,
                    data:formData,
                    processData:false,
                    contentType:false,
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        var data = resp.data;
                        if(parseInt(resp.status) == 200){
                            $('#modal-reservasi').modal('hide');
                            setTimeout(() => {
                                window.location.href=resp.message;
                            }, 500);
                        }else{
                            if(data.length == 0){
                                $('form#form-save .modal-body').find('#notif-alert').html(
                                    `<div class="alert alert-warning alert-dismissible border border-warning" role="alert">
                                    <i class="tf-icons bx bx-sm bx-info-circle"></i>
                                    ${resp.message}
                                    <button type="button" class="btn-close btn-alert" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`);
                            }else{
                                for(const val in data){
                                    const inputTag = 'form#form-save'+' #'+val;
                                    $(inputTag).addClass('is-invalid');
                                    if(!$(inputTag).parent().find('.invalid-feedback').length){
                                        $(inputTag).parent().append(
                                            `<div class="invalid-feedback">${data[val]} </div>`);
                                        }                     
                                }
                                showToast('danger','Peringatan',resp.message,'#toast-alert');
                            }
                        }
                    },error: function(){
                        $('#modal-reservasi').modal('hide');
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                    }
                });
            });
        }); 
        $("#modal-reservasi").on('hidden.bs.modal', function (e) {
            $('#form-save').trigger('reset');
        });
        function chooseLabroom(id,labName,tipeUser,hargaLab){
            resetNotifAndMore();
            if(tipeUser == 'non-civitas'){
                $('#form-save #payment').show();
            }
            $('#form-save').find('#id_lab').val(id);
            $('#form-save').find('input[name="name_lab"]').val(`${labName}`);
            $('#form-save').find('input#harga_sewa').val(hargaLab);
            $('#form-save').find('.harga-sewa').html(`${formatRupiah(hargaLab)}`);
            $('#modal-reservasi').modal('show');
        }
        function calcPaymentTotal(){
            var patternJam = /[0-9][0-9]:[0-9][0-9]-[0-9][0-9]:[0-9][0-9]/g;
            var waktuMulai = $('#form-save').find('#time_start').val();
            var waktuAkhir = $('#form-save').find('#time_end').val();
            if (checkIsNotEmptyNullValue(waktuMulai) 
                && checkIsNotEmptyNullValue(waktuAkhir)) {
                let waktu = waktuMulai+'-'+waktuAkhir; 
                if(patternJam.test(waktu)){
                    var startTime = moment(waktuMulai,"HH:mm");
                    var endTime = moment(waktuAkhir,"HH:mm");
                    var duration = moment.duration(endTime.diff(startTime));  
                    var intervalMenit = duration.asMinutes();
                    if(intervalMenit > 0){
                        var hargaSewa = $('#form-save').find('input#harga_sewa').val();
                        var hargaTotal = parseInt(hargaSewa) * intervalMenit; 
                        $('#form-save').find('#interval-menit').html(`${intervalMenit}`);
                        $('#form-save').find('#total-payment').html(`${formatRupiah(hargaTotal)}`);
                        $('#form-save').find('input[name="total_payment"]').val(hargaTotal);
                    }else{
                        $('#form-save').find('#interval-menit').html(`0`);
                        $('#form-save').find('#total-payment').html(`Rp.0`);
                        $('#form-save').find('input[name="total_payment"]').val(0);
                    }
                }
            }
        }
        function resetNotifAndMore(){
            $('form#form-save .modal-body').find('#notif-alert').empty();
            $('#form-save').find('#interval-menit').html(`0`);
            $('#form-save').find('#total-payment').html(`Rp.0`);
        }
    </script>
<?= $this->endSection('extrascript'); ?>
