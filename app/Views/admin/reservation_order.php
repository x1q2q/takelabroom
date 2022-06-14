<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">general /</span> Reservasi Order </h4>
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
            <h5 class="mt-2">Data Reservasi Order</h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-order">
        <thead>
            <tr>
            <th>No.</th>
            <th>Kode Pinjam</th>
            <th>Peminjam</th>
            <th>Ruang Lab</th>
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
                    "searchPlaceholder": "Cari di sini..."
                },
                "dom": '<"wrapper m-2 bg-label-secondary p-1"lf>rt<"wrapper rounded-3 bg-label-dark"<i><"row align-items-center"<""><p>>>',
                "processing": true,
                "serverSide": true,
                "order": [
                    [0, "desc"]
                ],
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
                        'data': 'full_name',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `${data}<br/>(${row.type_user})`;
                        }
                    },
                    {
                        'data': 'name_lab',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'status_order',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 'cancelled') ? 'danger' : (data == 'paided') 
                                ? 'primary': (data == 'confirmed') ? 'success' : 'warning' ;
                            let label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;

                            let btnStatus = (data == 'paided') ? 'primary' : 'success';
                            let btnTxt = (data == 'paided') ? 'Lihat Bukti' : 'Verifikasi';
                            let btn = `<button onclick="changeStts('${data}','${row.id_reserv}')" 
                                type="button" class="btn mt-1 btn-sm
                                btn-${btnStatus}" title="ganti status">${btnTxt}
                                </button>`;

                            let btnChangeStts = (data == 'paided' || data == 'confirmed') ? btn : '';
                            return label + '<br/>' + btnChangeStts;
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
                    "url": "<?php echo site_url('admin/reservasi-order/getdata') ?>",
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
        }); 

        function detailData(id){
            let urlDetail = '<?= site_url('admin/reservasi-order/detail/:id'); ?>';
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
            let urlDelete = "<?= site_url('admin/reservasi-order/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
    </script>
<?= $this->endSection('extrascript'); ?>
