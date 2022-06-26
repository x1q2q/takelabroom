<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">reservasi /</span> Reservasi Berbayar </h4>
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
    <div class="card">
    <div class="card-header row justify-content-between">
        <div class="col">
            <h5 class="mt-2">Reservasi Berbayar</h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-order">
        <thead>
            <tr>
            <th>No.</th>
            <th>Kode Pinjam</th>
            <th style="width:15%">Ruang Lab</th>
            <th>Peminjam</th>
            <th>Status Order</th>
            <th>Tot. Bayar</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
    </div>
    <!--/ Striped Rows -->
</div>
<!-- modal detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog sld-up" role="document">
        <div class="modal-content">
        <div class="modal-header border-bottom">
            <h5 class="modal-title">Detail Data</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
        <div class="modal-body p-4"> 
        <div id="form-detail">
                <div class="form-group row">
                    <label class="col-sm-4">Kode Pinjam</label>
                    <div class="col-sm-8">
                        <span id="code_reserv"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Peminjam</label>
                    <div class="col-sm-8">
                        <span id="peminjam"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Ruang Lab</label>
                    <div class="col-sm-8">
                        <span id="name_lab"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Rentang Waktu</label>
                    <div class="col-sm-8">
                        <span id="range_time"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Status Peminjaman</label>
                    <div class="col-sm-8">
                        <span id="status_reserv"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Tanggal Pinjam</label>
                    <div class="col-sm-8">
                        <span id="created_at"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Status Pembayaran</label>
                    <div class="col-sm-8">
                        <span id="status_order"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Total Pembayaran</label>
                    <div class="col-sm-8">
                        <span id="total_bayar"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Bukti Pembayaran</label>
                    <div class="col-sm-8">
                        <div id="thumb_order">
                        </div>	
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- modal info -->
<div class="modal fade" id="modal-info" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog sld-up modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header border-bottom">
            <h5 class="modal-title"></h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
        </div>
        <div class="modal-body p-4"> 
            <div id="form-detail">
                <div class="form-group row">
                    <span id="info"></span>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- modal-chstatus -->
<div class="modal fade" id="modal-chstatus" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog sld-up modal-dialog-centered" role="document">
    <form action="" method="POST" id="form-chstatus" class="modal-content" 
        tipe="" enctype="multipart/form-data">
        <input type="hidden" id="code_reserv"/>
            <div class="modal-header border-bottom">
                <h5 class="modal-title"></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-3 pb-0">
                <div id="text-info"></div>
                <div id="form-group"></div>

                <div class="modal-footer py-4 px-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success" id="btn-save"></button>
                </div>
            </div>
    </form>
    </div>
</div>
<?= $this->include('admin/templates/modal_delete'); ?>
<style type="text/css">
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        var urlPathThumb = "<?= base_url('assets/img/uploads/orders/'); ?>";
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
            var orderTable = $('#datatable-order').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari di sini...",
                    "emptyTable": "Data reservasi berbayar masih kosong",
                    "zeroRecords": "Data reservasi berbayar kosong"
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
                        "data": "id_order",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'code_reserv',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'name_lab',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'full_name',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `${data}<br/>(${row.type_user})`;
                        }
                    },
                    {
                        'data': 'status_order',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let label = '';
                            let btn = '';
                            if(data == 'pending'){
                                label = `<span class="badge bg-label-warning">pending</span>`;
                                btn = `<button onclick="showStatus('${data}','${row.code_reserv}')"
                                    type="button" data-bs-toggle="modal" data-bs-target="#modal-info" 
                                    class="btn btn-sm btn-success mt-1">Konfirmasi</button>`;
                            }else if(data == 'paided'){
                                label = `<span class="badge bg-label-success">paided</span>`;
                                btn = `<button class="btn btn-sm btn-info mt-1" 
                                onclick="changeStatus('${row.code_reserv}','${data}','${row.id_order}','${row.thumb_order}')"
                                type="button" data-bs-toggle="modal" data-bs-target="#modal-chstatus">Check Bukti</button>`;
                            }else if(data == 'confirmed'){
                                label = `<span class="badge bg-label-success">${data}</span>`;
                            }else{
                                let labelStatus = (data == 'cancelled') ? 'danger' : (data == 'finished')  
                                    ? 'success' : 'secondary' ;
                                label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;
                            }
                            return label + '<br/>' + btn;
                        }
                    },
                    {
                        'data': 'total_payment',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `${formatRupiah(data)}`;
                        }
                    },
                    {
                        'data': 'id_order',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            return `<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bxs-printer me-1"></i> Cetak invoice</a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="detailData(${data})"><i class="bx bxs-detail me-1"></i> Detail</a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="hapusData(${data})"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                            </div>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('admin/paid-reservations/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            orderTable.on('draw', function () {
                var total_records = orderTable.rows().count();
                var page_length = orderTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = orderTable.page.info().page+1;
            });
            
            $('#form-delete').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        if(parseInt(resp.status) == 200){
                            $('#confirm-delete').modal('hide');
                            orderTable.draw();
                            showToast('warning','Peringatan',resp.message,'#toast-alert');
                        }else{
                            showToast('danger','Peringatan',resp.message,'#toast-alert');
                        }
                    },error: function(){
                        $('#confirm-delete').modal('hide');
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                    }
                });
            });

            $('#form-chstatus').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('admin/paid-reservations/change-status'); ?>";
                let formData = new FormData(this);
                $.ajax({
                    type: $(this).attr('method'),
                    url: siteUrl,
                    data:formData,
                    processData:false,
                    contentType:false,
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        if(parseInt(resp.status) == 200){
                            $('#modal-chstatus').modal('hide');
                            orderTable.draw();
                            showToast('success','Sukses',resp.message,'#toast-alert');
                        }else{
                            showToast('warning','Peringatan',resp.message,'#toast-alert');
                        }
                    },error: function(){
                        $('#modal-chstatus').modal('hide');
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                    }
                });
            });
        }); 

        function detailData(id){
            let urlDetail = '<?= site_url('admin/paid-reservations/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    var peminjam = `${data.full_name} (${data.type_user})`;
                    var range_time = `${data.date_booking} (${data.time_start} - ${data.time_end})`;
                    var status_reserv = data.status_reserv;

                    var status_order = (data.status_order == 'cancelled') ? 'dibatalkan' 
                                : (data.status_order == 'paided') ? 'sudah dibayar'
                                : (data.status_order == 'confirmed') ? 'sudah dikonfirmasi' 
                                : 'menunggu pembayaran' ;
                    var total_bayar = formatRupiah(data.total_payment);
                    $('#form-detail').find('span#code_reserv').text(data.code_reserv);
                    $('#form-detail').find('span#name_lab').text(data.name_lab);
                    $('#form-detail').find('span#peminjam').text(peminjam);
                    $('#form-detail').find('span#range_time').text(range_time);
                    $('#form-detail').find('span#status_reserv').text(status_reserv);
                    $('#form-detail').find('span#created_at').text(data.created_at);
                    $('#form-detail').find('span#status_order').text(status_order);
                    $('#form-detail').find('span#total_bayar').text(total_bayar);
                    if(checkIsNotEmptyNullValue(data.thumb_order)){
                        $('#form-detail').find('#thumb_order').html(`
                        <img class="img-fluid rounded" src="${urlPathThumb}/${data.thumb_order}" alt="">`);
                    }else{
                        $('#form-detail').find('#thumb_order').text('-');
                    }

                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/paid-reservations/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
        function showStatus(status,codereserv){
            $('#modal-info').find('.modal-title').html(`Informasi Status
                <span class="badge bg-label-warning">${status}</span>`);
            $('#modal-info #form-detail').find('span#info').html(
                `<i>Untuk mengkonfirmasi reservasi berbayar ini, anda perlu menunggu member upload bukti pembayaran
                    terlebih dahulu :)</i>`);
        }
        function changeStatus(codereserv,status,idorder,imgPath=''){
            if(status == 'paided'){
                $('#modal-chstatus').find('.modal-title').html(`Konfirmasi Order`);
                $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                    `Ya, Konfirmasi <span class="tf-icons bx bxs-check-circle"></span>`);
                $('#modal-chstatus .modal-body').find('#text-info').html(
                    `<div><b>Bukti Pembayaran: </b></div>
                    <img class="img-fluid rounded mb-3" style="max-width:300px" 
                    src="${urlPathThumb}/${imgPath}" alt="bukti pembayaran">
                    <p>Yakin untuk mengkonfirmasi reservasi berbayar <b>${codereserv}</b> (?) </p>`);
                $('#modal-chstatus .modal-body').find('#form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="confirmed">
                        <input type='hidden' name="id_order" value="${idorder}">
                        <input type='hidden' name="code_reserv" value="${codereserv}">
                    </div>`);    
            }     
        }
    </script>
<?= $this->endSection('extrascript'); ?>
