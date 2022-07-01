<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">umum /</span> Data Member </h4>
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
            <h5 class="mt-2">Data Member</h5>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-user">
        <thead>
            <tr>
            <th>No.</th>
            <th>NIM <br/>(email)</th>
            <th style="width:20%;">Nama <br/>(username)</th>
            <th style="width: 10%;">Tipe</th>
            <th style="width: 10%;">Status</th>
            <th>Thumbnail</th>
            <th style="width: 20%;">Aksi</th>
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
                    <label class="col-sm-4">NIM</label>
                    <div class="col-sm-8">
                        <span id="nim"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Username</label>
                    <div class="col-sm-8">
                        <span id="username"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">E-mail</label>
                    <div class="col-sm-8">
                        <span id="email"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Nama Lengkap</label>
                    <div class="col-sm-8">
                        <span id="full_name"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Tipe User</label>
                    <div class="col-sm-8">
                        <span id="type_user"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <span id="gender"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">No. Telpon</label>
                    <div class="col-sm-8">
                        <span id="notelp"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Status</label>
                    <div class="col-sm-8">
                        <span id="status"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Tanggal Registrasi</label>
                    <div class="col-sm-8">
                        <span id="created_at"></span>
                    </div>
                </div>
                <div class="form-group row">	
                    <label class="col-sm-4">Thumbnail</label>	
                    <div class="col-sm-8">	
                        <div id="thumb_user">
                        </div>	
                    </div>
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
            var userTable = $('#datatable-user').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari di sini...",
                    "emptyTable": "Data member masih kosong",
                    "zeroRecords": "Data member kosong"
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
                        "data": "id_user",
                        'className':'order-no',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'nim',
                        'className': "text-left",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `${data}<br/>(${row.email})`;
                        }
                    },
                    {
                        'data': 'full_name',
                        'className': "text-left",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `${data}<br/>(${row.username})`;
                        }
                    },
                    {
                        'data': 'type_user',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 'civitas') ? 'primary':'secondary';
                            let txtStatus = (data == 'civitas') ? 'Civitas':'Non-Civitas';
                            return `<span class="badge rounded-pill bg-label-${labelStatus} me-1">${txtStatus}</span>`;
                        }
                    },
                    {
                        'data': 'is_activated',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 1) ? 'success':'warning';
                            let txtStatus = (data == 1) ? 'Activated':'Not Activated';
                            return `<span class="badge bg-label-${labelStatus} me-1">${txtStatus}</span> `;
                        }
                    },
                    {
                        'data': 'thumb_user',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            var urlImgBased = "<?= base_url('assets/img/avatars/user1.jpg'); ?>";
                            let imgShow = (checkIsNotEmptyNullValue(data)) ? urlPathThumb+'/'+data : urlImgBased;
                            return `<img src="${imgShow}" class="img-fluid img-thumb rounded img-avatar">`;
                        }
                    },
                    {
                        'data': 'id_user',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            var btnVerified = (row.is_activated == 0) ? 
                                `<button onclick="changeStatus('${data}')" type="button" 
                                data-bs-toggle="modal" data-bs-target="#modal-chstatus" 
                                class="btn rounded-pill btn-icon btn-success" title="avtivate user">
                                <span class="tf-icons bx bxs-user-check"></span>
                            </button>` : 
                                `<button disabled class="btn rounded-pill 
                                    btn-icon btn-secondary disable">
                                    <span class="tf-icons bx bxs-user-check"></span>
                                    </button>`;
                            return `
                            ${btnVerified}
                            <button onclick="detailData('${data}')" type="button" class="btn rounded-pill
                             btn-icon btn-primary" title="detail data"> 
                             <span class="tf-icons bx bxs-detail"></span>
                            </button>
                            <button onclick="hapusData('${data}')" type="button" class="btn rounded-pill btn-icon 
                            btn-danger" title="hapus data">
                              <span class="tf-icons bx bx-trash"></span>
                            </button>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('admin/list-members/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            userTable.on('draw', function () {
                var total_records = userTable.rows().count();
                var page_length = userTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = userTable.page.info().page+1;
            });

            $('#form-chstatus').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('admin/list-members/change-status'); ?>";
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
                            userTable.draw();
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

            $('#form-delete').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        if(parseInt(resp.status) == 200){
                            $('#confirm-delete').modal('hide');
                            userTable.draw();
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
            let urlDetail = '<?= site_url('admin/list-members/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    var status = (data.is_activated == 1) ? 'Activated':'Not Activated';
                    $('#form-detail').find('span#nim').text(data.nim);
                    $('#form-detail').find('span#username').text(data.username);
                    $('#form-detail').find('span#email').text(data.email);
                    $('#form-detail').find('span#full_name').text(data.full_name);
                    $('#form-detail').find('span#type_user').text(data.type_user);
                    $('#form-detail').find('span#gender').text(data.gender);
                    $('#form-detail').find('span#notelp').text(data.notelp);
                    $('#form-detail').find('span#status').text(status);
                    $('#form-detail').find('span#created_at').text(data.created_at);
                    $('#form-detail').find('#thumb_user').html(
                        `<img class="img-fluid rounded" src="${urlPathThumb}/${data.thumb_user}" alt="">`);

                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/list-members/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
        function changeStatus(iduser){
            $('#modal-chstatus').find('.modal-title').html(`Aktivasi Member`);
            $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                `Aktivasi <span class="tf-icons bx bxs-check-circle"></span>`);
            $('#modal-chstatus .modal-body').find('#text-info').html(
                `<p>Yakin untuk mengaktivasi akun member? (?) </p>
                <i>*mengaktifkan akun membuat akun bisa berfungsi sebagaimana mestinya</i>`);
            $('#modal-chstatus .modal-body').find('#form-group').html(
                `<div class="row">
                    <input type='hidden' name="id_user" value="${iduser}">
                </div>`
            );
        }
    </script>
<?= $this->endSection('extrascript'); ?>
