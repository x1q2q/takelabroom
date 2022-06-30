<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
        reservasi /</span> Reservasi Saya 
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
    <div class="alert alert-info border border-info" role="alert">
        <i class="tf-icons bx bx-sm bx-info-circle"></i>
        Silakan mengajukan reservasi di menu `Ajukan Reservasi`
    </div>
    <div class="card">
        <div class="card-header bg-secondary nopadding row">
            <div class="col py-3">
                <h5 class="text-white nopadding">Reservasi Saya</h5>
            </div>
        </div>
        <div class="table-responsive text-wrap">
            <table class="table table-striped table-responsive" id="datatable-reserv">
            <thead>
                <tr>
                <th>No.</th>
                <th>Kode Pinjam</th>
                <th style="width:15%">Ruang Lab</th>
                <th>Harga Sewa</th>
                <th>Rentang Waktu</th>
                <th width="13%">Status</th>
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
            <div id="form-info">
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
    <form action="<?= site_url('member/my-reservations/change-status'); ?>" method="POST" 
        id="form-chstatus" class="modal-content" tipe="" enctype="multipart/form-data">
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

<!-- modal-upload -->
<div class="modal fade" id="modal-upload" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog sld-up modal-dialog-centered" role="document">
    <form action="<?= site_url('member/my-reservations/upload-bukti'); ?>" method="POST" 
        id="form-upload" class="modal-content" tipe="" enctype="multipart/form-data">
        <input type="hidden" id="code_reserv"/>
            <div class="modal-header border-bottom">
                <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-3 pb-0">
                <div id="text-info">
                    <ul>
                    <li>Silakan upload bukti transfer untuk pembayaran reservasi lab <span id="labroom"></span></li>
                     <li>Pembayaran harus sesuai dengan total harga sewa yaitu: <span id="total_payment"></span></li>
                     <li>Dapat dibayarkan melalui no. rekening berikut: <ul>
                        <li>(BRI): 629-556-7789-030 (a.n rafikbojes)</li>
                        <li>(BCA): 631-325-5235-212 (a.n firdausditio)</li>
                        <li>(MANDIRI): 992-5-29-11 (a.n anwar baung)</li>
                        <li>(DANA/OVO): +628-5790-523 (a.n adit serizawa)</li>
                     </ul></li>
                    </ul>
                </div>
                <div id="form-group">
                    <div class="row mx-1 mt-3 border border-secondary rounded">
                        <div class="col-12">
                            <div class="custom-file border-bottom p-2" id="thumb_bukti">
                                <input type="file" name="thumb_bukti" hidden class="form-control" accept=".png,.jpg,.jpeg" id="bukti-file" required>
                                <input type="text" name="bukti_file_name" value="" class="form-control" hidden id="bukti-file-name" >
                                <label class="btn-secondary btn" for="bukti-file" style="padding: 4px 10px">
                                <span class="tf-icons bx bxs-image-add"></span>
                                    Pilih </label>
                                <label id="bukti-file-name-label" for="bukti-file">Tidak ada file gambar yang dipilih</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"></div>
                </div>

                <div class="modal-footer py-4 px-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-success" id="btn-save">
                        Upload Bukti <span class="tf-icons bx bxs-cloud-upload"></span>
                    </button>
                </div>
            </div>
    </form>
    </div>
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
<style type="text/css">

</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <?= script_tag('assets/vendor/libs/timepicker/jquery.timepicker.min.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
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
                    "searchPlaceholder": "Cari di sini...",
                    "emptyTable": "Belum ada riwayat reservasi",
                    "zeroRecords": "Belum ada riwayat reservasi"
                },
                "dom": '<"wrapper m-2 bg-label-secondary p-1"lf>rt<"wrapper rounded-3 bg-label-dark"<i><"row align-items-center"<""><p>>>',
                "processing": true,
                "serverSide": true,
                "aLengthMenu": [[5, 15, 30],[ 5, 15, 30]],
                "order": [
                    [0, "desc"]
                ],
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
                        'data': 'total_payment',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return (checkIsNotEmptyNullValue(data)) ? 
                                `<b>${formatRupiah(data)}</b>`:'<b>Rp.0</b>';
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
                        'data': 'status',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let label = '';
                            let btn = ``;
                            if(data == 'pending'){
                                label = `<span class="badge bg-label-warning">pending</span>`;
                                if(row.is_order == '1'){
                                    btn = `<button data-bs-toggle="modal" data-bs-target="#modal-upload"
                                    onclick="changeStatus('${data}',${row.id_reserv},'${row.name_lab}','${row.total_payment}','${row.code_reserv}')"   
                                    type="button" class="btn btn-sm btn-outline-success mt-1">Upload Bukti</button>`;
                                }else{
                                    btn = `<button onclick="showStatus('not_paid','${data}')"
                                        data-bs-toggle="modal" data-bs-target="#modal-info"
                                        class="btn btn-sm btn-info mt-1">Check Info</button>`;
                                }
                            }else if(data == 'paided'){
                                label = `<span class="badge bg-label-success">paided</span>`;
                                btn = `<button type="button" onclick="showStatus('paid','${data}')"
                                        data-bs-toggle="modal" data-bs-target="#modal-info" 
                                        class="btn btn-sm btn-info mt-1">Check Info</button>`;
                            }else if(data == 'confirmed' || data == 'verified'){
                                label = `<span class="badge bg-label-success me-1">${data}</span>`;
                                btn = `<button data-bs-toggle="modal" data-bs-target="#modal-chstatus" 
                                type="button" onclick="changeStatus('${data}','${row.id_reserv}','${row.name_lab}')"
                                    class="btn btn-sm btn-outline-primary mt-1">Kembalikan Lab</button>`;
                            }else{
                                let labelStatus = (data == 'cancelled') ? 'danger' : 
                                    (data == 'finished') ? 'primary': 'secondary' ;
                                label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;
                            }
                            return label + '<br/>' + btn;
                        }
                    },
                    {
                        'data': 'created_at',
                        'className': "text-left",
                        'orderable': false,
                    },
                    {
                        'data': 'id_reserv',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            var btnCancel = (row.status == 'pending' || row.status == 'paided') ? 
                                `<a class="dropdown-item" href="javascript:void(0);" onclick="cancelData('${data}','${row.code_reserv}')">
                                    <i class="bx bxs-minus-circle me-1"></i> Cancel</a>` : 
                                `<a class="dropdown-item disabled">
                                    <i class="bx bxs-minus-circle me-1"></i> Cancel</a>`;
                            return `<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="detailData(${data})">
                                    <i class="bx bxs-detail me-1"></i> Detail</a>
                                ${btnCancel}
                            </div>
                            </div>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('member/my-reservation/getdata/user_id/'.$userid); ?>",
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

            $('#form-chstatus, #form-upload').submit(function(e){
                e.preventDefault();
                let formData = new FormData(this);
                let formOpened = $(this).attr('id');
                let modalOpened = ( formOpened == 'form-upload') ? 
                    '#modal-upload':'#modal-chstatus';
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data:formData,
                    processData:false,
                    contentType:false,
                    success: function(response){ 
                        var resp = JSON.parse(response);
                        if(parseInt(resp.status) == 200){
                            $(modalOpened).modal('hide');
                            reservTable.draw();
                            showToast('success','Sukses',resp.message,'#toast-alert');
                        }else{
                            showToast('warning','Peringatan',resp.message,'#toast-alert');
                        }
                        removeImg('#btn-remove-img');
                    },error: function(){
                        $(modalOpened).modal('hide');
                        showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                        removeImg('#btn-remove-img');
                    }
                });
            });
        });

        $('#bukti-file').on('change', function (e) {
          let file = $('#bukti-file')[0].files[0]
          let ukuran = file.size;
          let name = file.name;
          let type = file.type;
          var allowtypes = ['image/jpeg', 'image/jpg', 'image/png'];
            console.log(file);
          if (e.target.files.length > 0) {
            if(jQuery.inArray(type, allowtypes) >= 0 && ukuran <= 2000000){
                let newName = (name.length > 40) ? name.substr(-30):name;
                $('#bukti-file-name').val('img-'+newName);	
                $('#bukti-file-name-label').html('img-'+newName);
                if($('#btn-remove-img').length <= 0){
                    let btnRemoveImg = `<a id="btn-remove-img" onclick="removeImg(this)" 
                        class="btn btn-sm btn-outline-secondary btn-icon"> <span class="tf-icons bx bx-trash"></span></a>`;
                    $('#bukti-file').parent().append(btnRemoveImg);
                }
            }else{
                if(jQuery.inArray(type, allowtypes) < 0) {
                    showToast('warning','Peringatan','Tipe file tidak diijinkan!','#toast-alert');
                }else if(ukuran > 2000000){
                    showToast('warning','Peringatan','File tidak boleh lebih dari 2MB','#toast-alert');
                }
                $('#bukti-file-name-label').html("Tidak ada file gambar yang dipilih");
                $('#bukti-file').val('');
                removeImg('#btn-remove-img');
            }
          }
        });

        function removeImg(img){
            $('#bukti-file-name-label').html("Tidak ada file gambar yang dipilih");
            $('#bukti-file').val('');
            $('#bukti-file-name').val('');
            $(img).remove();
        }

        function showStatus(tipe,status){
            if(tipe == 'paid'){
                $('#modal-info').find('.modal-title').html(`Informasi Status
                    <span class="badge bg-label-success">${status}</span>`);
                $('#modal-info #form-info').find('span#info').html(
                    `<i>Anda perlu menunggu admin mengkonfirmasi bukti pembayaran reservasi ini agar bisa menggunakan lab :)</i>`);
            }else if(tipe == 'not_paid'){
                $('#modal-info').find('.modal-title').html(`Informasi Status
                    <span class="badge bg-label-warning">${status}</span>`);
                $('#modal-info #form-info').find('span#info').html(
                    `<i>Kamu perlu menunggu admin memverifikasi reservasi ini agar bisa menggunakan lab :)</i>`);
            }
        }
        function changeStatus(status, idreserv, labroom, payment='', codereserv=''){
            if(status == 'pending'){
                $('#modal-upload .modal-body').find('span#labroom').html(`<b>${labroom}</b>`);
                $('#modal-upload .modal-body').find('span#total_payment').html(`<b>${formatRupiah(payment)}</b>`);
                $('#modal-upload .modal-body').find('.form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="finished">
                        <input type='hidden' name="code_reserv" value="${codereserv}">
                    </div>`
                );
            }else if(status == 'confirmed' || status == 'verified'){
                $('#modal-chstatus').find('.modal-title').html(`Kembalikan Labroom`);
                $('#modal-chstatus .modal-footer').find('button#btn-save').html(
                    `Ya, Kembalikan <span class="tf-icons bx bx-refresh"></span>`);
                $('#modal-chstatus .modal-body').find('#text-info').html(
                    `<p>Yakin untuk mengembalikan labroom ${labroom} (?) </p>
                    <i>*mengembalikan labroom akan mengubah status reservasi menjadi 'finished'</i>`);
                $('#modal-chstatus .modal-body').find('#form-group').html(
                    `<div class="row">
                        <input type='hidden' name="status" value="finished">
                        <input type='hidden' name="id_reserv" value="${idreserv}">
                    </div>`
                );
            }
        }
        function cancelData(idreserv,codereserv){
            $('#modal-chstatus').modal('show');
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
        }
        function detailData(id){
            var urlPathThumb = "<?= base_url('assets/img/uploads/orders/'); ?>";
            var urlDetail = '<?= site_url('member/my-reservations/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    var peminjam = `${data.full_name} (${data.type_user})`;
                    var range_time = `${data.date_booking} (${data.time_start} - ${data.time_end})`;
                    var status = data.status_reserv;
                    var need_order_confirm = (checkIsNotEmptyNullValue(data.status_order)) ? 'Ya' : 'Tidak';
                    var status_order = '-';
                    var total_bayar = '-';
                    if(checkIsNotEmptyNullValue(data.status_order)){
                        status_order = (data.status_order == 'cancelled') ? 'dibatalkan' 
                                    : (data.status_order == 'paided') ? 'sudah dibayar'
                                    : (data.status_order == 'confirmed') ? 'sudah dikonfirmasi' 
                                    : 'menunggu pembayaran' ;
                        total_bayar = formatRupiah(data.total_payment);
                    }
                    $('#form-detail').find('span#code_reserv').text(data.code_reserv);
                    $('#form-detail').find('span#name_lab').text(data.name_lab);
                    $('#form-detail').find('span#peminjam').text(peminjam);
                    $('#form-detail').find('span#range_time').text(range_time);
                    $('#form-detail').find('span#status').text(status);
                    $('#form-detail').find('span#need_order_confirmation').text(need_order_confirm);
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
    </script>
    <?php if(session()->has('success')): ?>
        <script type="text/javascript">
            var msg = "<?= session('success'); ?>";
            showToast('success','Sukses',msg,'#toast-alert');
        </script>
    <?php endif; ?>
<?= $this->endSection('extrascript'); ?>
