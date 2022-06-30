<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">reservasi /</span> Semua Reservasi </h4>
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
            <h5 class="mt-2">Semua Reservasi</h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-reserv">
        <thead>
            <tr>
            <th>No.</th>
            <th>Kode Pinjam</th>
            <th style="width:15%">Ruang Lab</th>
            <th>Peminjam</th>
            <th>Rentang Waktu</th>
            <th style="width: 15%;">Status</th>
            <th>Tgl Pinjam</th>
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
                        <span id="status"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Perlu pembayaran</label>
                    <div class="col-sm-8">
                        <span id="need_order_confirmation"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Tanggal Pinjam</label>
                    <div class="col-sm-8">
                        <span id="created_at"></span>
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
        var urlPathThumb = "<?= base_url('assets/img/uploads/users/'); ?>";
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
            var reservTable = $('#datatable-reserv').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari kode pinjam ...",
                    "emptyTable": "Data reservasi masih kosong",
                    "zeroRecords": "Data reservasi kosong"
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
                        "data": "code_reserv",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return `<b>${data}</b>`;
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
                            let label = '';
                            let btn = '';
                            let isNeedPaid = (row.type_user == 'civitas') ? 'not_paid' : 'paid';
                            if(data == 'pending'){
                                label = `<span class="badge bg-label-warning">pending</span>`;
                                let dataTarget = (isNeedPaid == 'paid') ? '#modal-info' : '#modal-chstatus';
                                btn = `<button class="btn btn-sm btn-success mt-1"
                                onclick="showStatus('${isNeedPaid}','${data}','${row.code_reserv}','${row.id_reserv}')"
                                type="button" data-bs-toggle="modal" data-bs-target="${dataTarget}">
                                    Verifikasi</button>`;
                            }else if(data == 'verified'){
                                label = `<span class="badge bg-label-success">${data}</span>`;
                                btn = `<button onclick="changeStatus('selesaikan','${row.code_reserv}','${row.id_reserv}')"
                                    type="button" data-bs-toggle="modal" data-bs-target="#modal-chstatus" 
                                    class="btn btn-sm btn-primary mt-1">Selesaikan</button>`;
                            }else{
                                let labelStatus = (data == 'cancelled') ? 'danger' : (data == 'finished')  
                                    ? 'success' : 'secondary' ;
                                label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;
                            }
                            return label + '<br/>' + btn;
                        }
                    },
                    {
                        'data': 'created_at',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'id_reserv',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            var btnCancel = (row.status_reserv == 'pending') ? 
                                `<a class="dropdown-item" href="javascript:void(0);"
                                    data-bs-toggle="modal" data-bs-target="#modal-chstatus"  
                                    onclick="changeStatus('cancel','${row.code_reserv}','${data}')">
                                    <i class="bx bxs-minus-circle me-1"></i> Cancel</a>` : 
                                `<a class="dropdown-item disabled">
                                    <i class="bx bxs-minus-circle me-1"></i> Cancel</a>`;
                            return `<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="detailData(${data})"><i class="bx bxs-detail me-1"></i> Detail</a>
                                ${btnCancel}
                                <a class="dropdown-item" href="javascript:void(0);" onclick="hapusData(${data})"><i class="bx bx-trash me-1"></i> Hapus</a>
                            </div>
                            </div>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('admin/all-reservations/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            reservTable.on('draw', function () {
                var total_records = reservTable.rows().count();
                var page_length = reservTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = reservTable.page.info().page+1;
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
                            reservTable.draw();
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
                let siteUrl = "<?= site_url('admin/all-reservations/change-status'); ?>";
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
                            reservTable.draw();
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
            let urlDetail = '<?= site_url('admin/all-reservations/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    var peminjam = `${data.full_name} (${data.type_user})`;
                    var range_time = `${data.date_booking} (${data.time_start} - ${data.time_end})`;
                    var status = data.status_reserv;
                    var need_order_confirm = (data.type_user == 'civitas') ? 'Tidak' : 'Ya';
                    $('#form-detail').find('span#code_reserv').text(data.code_reserv);
                    $('#form-detail').find('span#name_lab').text(data.name_lab);
                    $('#form-detail').find('span#peminjam').text(peminjam);
                    $('#form-detail').find('span#range_time').text(range_time);
                    $('#form-detail').find('span#status').text(status);
                    $('#form-detail').find('span#need_order_confirmation').text(need_order_confirm);
                    $('#form-detail').find('span#created_at').text(data.created_at);

                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/all-reservations/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
        function showStatus(tipe,status,codereserv,idreserv){
            if(tipe == 'paid'){
                $('#modal-info').find('.modal-title').html(`Informasi Status
                    <span class="badge bg-label-warning">${status}</span>`);
                $('#modal-info #form-detail').find('span#info').html(
                    `<i>Untuk memverifikasi reservasi ini, anda perlu menunggu member upload bukti pembayaran
                     terlebih dahulu :)</i><br/><br/> <i>*agar bisa melihat bukti pembayaran member, 
                     masuk ke menu 'Reservasi Berbayar'.</i>`);
            }else if(tipe == 'not_paid'){
                $('#modal-chstatus').find('.modal-title').html(`Verifikasi Reservasi`);
                $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                    `Ya, Verifikasi <span class="tf-icons bx bxs-check-circle"></span>`);
                $('#modal-chstatus .modal-body').find('#text-info').html(
                    `<p>Yakin untuk memverifikasi reservasi dengan kode pinjam <b>${codereserv}</b> (?) </p>`);
                $('#modal-chstatus .modal-body').find('#form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="verified">
                        <input type='hidden' name="id_reserv" value="${idreserv}">
                    </div>`
                );
            }
        }
        function changeStatus(tipe,codereserv,idreserv){
            if(tipe == 'cancel'){
                $('#modal-chstatus').find('.modal-title').html(`Batalkan Reservasi`);
                $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                    `Ya, Batalkan <span class="tf-icons bx bxs-minus-circle"></span>`);
                $('#modal-chstatus .modal-body').find('#text-info').html(
                    `<p>Yakin untuk membatalakan reservasi <b>${codereserv}</b> (?) </p>
                    <i>*membatalkan reservasi akan mengubah status reservasi menjadi 'cancelled'</i>`);
                $('#modal-chstatus .modal-body').find('#form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="cancelled">
                        <input type='hidden' name="id_reserv" value="${idreserv}">
                        <input type='hidden' name="code_reserv" value="${codereserv}">
                    </div>`
                );
            }else{
                $('#modal-chstatus').find('.modal-title').html(`Selesaikan Reservasi`);
                $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                    `Ya, Selesaikan <span class="tf-icons bx bxs-check-circle"></span>`);
                $('#modal-chstatus .modal-body').find('#text-info').html(
                    `<p>Yakin untuk menyelesaikan reservasi <b>${codereserv}</b> (?) </p>
                    <i>*menyelesaikan reservasi akan mengubah status reservasi menjadi 'finished'</i>`);
                $('#modal-chstatus .modal-body').find('#form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="finished">
                        <input type='hidden' name="id_reserv" value="${idreserv}">
                    </div>`);
            }            
        }
    </script>
<?= $this->endSection('extrascript'); ?>
