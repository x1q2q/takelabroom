<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-2 mb-4"><span class="text-muted fw-light">reservasi /</span> 
    <?php if(!empty($pencarian['category'])){ ?>
        <a href="<?= base_url('member/add-reservation/'); ?>" class="text-primary fw-normal"> Ajukan Reservasi </a>  
        <span class="text-muted fw-light"> / pencarian data </span>
    <?php }else{ ?>
        Ajukan Reservasi 
    <?php  } ?>
    </h4>
    <!-- Striped Rows -->
    <div class="card mx-2">
        <form method="get" action="">
        <div class="input-group">
            <span class="input-group-text bg-primary">
                <select class="form-select" name="category">
                    <option selected="" value="all"
                        <?= ($pencarian['category'] == 'all') ? 'selected': ''; ?>>Semua Kategori</option>
                    <?php foreach($category as $val): ?>
                        <option value="<?= $val->id_category?>"
                            <?= ($pencarian['category'] == $val->id_category) ? 'selected': ''; ?>> 
                        <?= $val->name_category; ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
                <input type="search" class="form-control py-2" id="input-cari" 
                name="q" placeholder="Cari labroom di sini ..." value="<?= $pencarian['keyword']; ?>">
                <button type="submit" class="input-group-text bg-primary btn-primary">
                    <i class="bx bx-search bx-sm text-white"></i>
                </button>
            </div>
        </form>
    </div>
    <?php if(!empty($pencarian['category'])){ ?>
        <div class="mx-2 my-4">
            <div class="alert alert-info border border-info" role="alert">
                <i class="tf-icons bx bx-sm bx-info-circle"></i>
                Hasil pencarian untuk `<?= $pencarian["keyword"]; ?>`
            </div>
        </div>
        <?php if(count($labroom) < 1): ?>
            <div class="card mx-2">
                <div class="card-body" style="border:2px dashed #ffab00;">                    
                <i class="text-warning h5">Pencarian tidak ditemukan :(</i>
                </div>
            </div>
        <?php endif; ?>
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
    <?php }else{ ?>
    <div class="cards mt-3">
        <?php foreach($category as $val): ?>
            <div class="card card-category">
                <div class="card-header bg-primary">
                    <span class="card-title text-white">
                        <?= $val->name_category; ?>
                    </span>
                </div>
                <div class="card-body has-bg-img" style="background-image: url(
                    <?= base_url('assets/img/uploads/categories/'.$val->thumb_category); ?>)">
                    <div class="caption sld-up text-center">
                        <p><?= $val->desc_category; ?></p>
                        <a href="<?= site_url('member/add-reservation/'.$val->slug); ?>" 
                        class="btn text-center rounded-pill btn-primary">
                        Check Ruang Lab <span class="tf-icons bx bxs-chevrons-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php } ?>
    <!--/ Striped Rows -->
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
                <h5 class="modal-title">Pengajuan Reservasi </h5>
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
.card.card-category{
    box-sizing: border-box;
    margin: 1em;
    flex:1 1 auto;
    flex-direction: column;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 
        0 3px 1px -2px rgba(0,0,0,0.2), 
        0 1px 5px 0 rgba(0,0,0,0.3)
}
.card-body.has-bg-img{
    min-height: 210px;
    position: relative;
    border-radius: 0px 0px 6px 6px;
}
.card-body.has-bg-img:hover .caption{
    display: block!important;
}
.has-bg-img{
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
.card-header{
    padding:10px 20px;
    box-shadow: inset 0px -2px 2px rgba(0,0,0,0.2);
}
.card-title{
    font-size: 1.1rem;
}
.caption{
    animation: fadeIn .5s ease-in-out;
    background: rgba(0,0,0,0.7);
	width: 100%;
	display: none!important;
	padding: 20px;
	color:#fff;
	position: absolute;
	bottom: 0;
    align-items: start;
	top:0;
	left:0;
	right: 0;
    border-radius: 0px 0px 6px 6px;
    margin: 0 auto;
}
.caption p{
    font-size: 13px;
    text-align: left !important;
}
@keyframes fadeIn{
	from{
		opacity: 0;
	}to{
		opacity: 1;
	}
}
@media screen and (max-width: 40em) {
    .card.card-category {
       min-width: calc(50% -  2em);
    }
    .card.card-labroom{
       max-width: calc(50% -  1em);
    }
}
 
@media screen and (min-width: 41em) {
    .card.card-category {
        max-width: calc(33.3% - 2em);
    }
}
@media screen and (min-width: 70em) {
    .card.card-category {
        min-width: calc(33.3% - 2em);
    }
}

select.form-select{
    max-width: 200px;
    text-overflow: ellipsis;
}
#input-cari{
    font-size: 18px;
    font-weight: lighter;
}
.card.card-labroom{
    flex: 1 1 auto;
    box-sizing: border-box;
    margin: .5em;
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
