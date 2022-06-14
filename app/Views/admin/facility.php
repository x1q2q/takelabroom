<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">labroom /</span> Fasilitas </h4>
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
            <h5 class="mt-2">Data Fasilitas</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-dark rounded-3" onclick="addData()"
            data-bs-toggle="modal" data-bs-target="#modal-save">
                Tambah Fasilitas <i class="bx bx-sm bxs-plus-circle"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-fasilitas">
        <thead>
            <tr>
            <th>No.</th>
            <th>Nama Fasilitas</th>
            <th>Jumlah</th>
            <th>Harga Sewa<br/> (per-menit)</th>
            <th>Thumbnail</th>
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
                    <label for="code" class="col-sm-4">Fasilitas</label>
                    <div class="col-sm-8">
                        <span id="name_facility"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent" class="col-sm-4">Jumlah</label>
                    <div class="col-sm-8">
                        <span id="qty_facility"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4">Harga Sewa</label>
                    <div class="col-sm-8">
                        <span id="price"></span>
                    </div>
                </div>	
                <div class="form-group row">	
                    <label for="thumb_faciliy" class="col-sm-4">Thumbnail</label>	
                    <div class="col-sm-8">	
                        <div id="thumb_facility">
                        </div>	
                    </div>
                </div>	
            </div>
        </div>
        </div>
    </div>
</div>
<?= $this->include('admin/templates/modal_delete'); ?>

<!-- modal save -->
<div class="modal fade" id="modal-save" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog sld-up" role="document">
    <form action="" method="POST" id="form-save" class="modal-content" 
        tipe="" enctype="multipart/form-data">
        <input type="hidden" id="id_facility"/>
            <div class="modal-header border-bottom">
                <h5 class="modal-title"></h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body p-4 pb-0">
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="name_facility" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="name_facility" id="name_facility" 
                    placeholder="Masukkan nama fasilitas (cth: komputer win7)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="qty_facility" class="form-label">Jumlah</label>
                    <div class="input-group">
                        <input type="number" id="qty_facility" class="form-control" placeholder="Masukkan jumlah (cth: 1)" name="qty_facility"/>
                        <span class="input-group-text">PCS</span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="price" class="form-label">Harga sewa/menit</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" id="price" class="form-control" placeholder="Masukkan harga sewa (cth: 5000)" name="price"/>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="thumb_facility" class="form-label">Thumbnail</label>
                        <div class="custom-file border-bottom p-2" id="thumb_facility">
                            <input type="file" name="thumb_facility" hidden class="form-control" accept=".png,.jpg,.jpeg" id="facility-file">
                            <input type="text" name="facility_file_name" value="" class="form-control" hidden id="facility-file-name" >
                            <label class="btn-secondary btn" for="facility-file" style="padding: 4px 10px">
                            <span class="tf-icons bx bxs-image-add"></span>
                                Pilih </label>
                            <label id="facility-file-name-label" for="facility-file">Tidak ada gambar yang dipilih</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer py-4 px-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-success" id="btn-save">Simpan 
                    <span class="tf-icons bx bxs-check-circle"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        var urlPathThumb = "<?= base_url('assets/img/uploads/facilities/'); ?>";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': tokenHash
            }
        });
        $(document).ready(function() {
            var fasilitasTable = $('#datatable-fasilitas').DataTable({
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
                        "data": "id_facility",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'name_facility',
                        'className': "text-left",
                        'orderable': true,
                    },
                    {
                        'data': 'qty_facility',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `${data} pcs`;
                        }
                    },
                    {
                        'data': 'price',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `${formatRupiah(data)}`;
                        }
                    },
                    {
                        'data': 'thumb_facility',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let attrImg = (!checkIsNotEmptyNullValue(data)) ? '-' : 
                            `<img src="${urlPathThumb+'/'+data}" class="img-fluid rounded img-thumb">`;
                            return attrImg;
                        }
                    },
                    {
                        'data': 'id_facility',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            return `<button onclick="detailData('${data}')" type="button" class="btn rounded-pill 
                            btn-icon btn-primary" title="detail data">
                              <span class="tf-icons bx bxs-detail"></span>
                            </button>
                            <button onclick="editData('${data}')" type="button" class="btn rounded-pill btn-icon 
                            btn-warning" title="edit data">
                              <span class="tf-icons bx bx-edit-alt"></span>
                            </button>
                            <button onclick="hapusData('${data}')" type="button" class="btn rounded-pill btn-icon 
                            btn-danger" title="hapus data">
                              <span class="tf-icons bx bx-trash"></span>
                            </button>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('admin/fasilitas/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            fasilitasTable.on('draw', function () {
                var total_records = fasilitasTable.rows().count();
                var page_length = fasilitasTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = fasilitasTable.page.info().page+1;
            });

            $('#form-save').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('admin/fasilitas/'); ?>";
                let formData = new FormData(this);
                let idFacility = $('#form-save').find('#id_facility').val();
                let urlPost =  ($(this).attr('tipe') == 'add') ? 
                    `${siteUrl}/insert`: `${siteUrl}/update/${idFacility}`;
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
                            $('#modal-save').modal('hide');
                            fasilitasTable.draw();
                            showToast('success','Sukses',resp.message,'#toast-alert');
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
                    },error: function(){
                        $('#modal-save').modal('hide');
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
                            fasilitasTable.draw();
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

        $("#modal-save").on('hidden.bs.modal', function (e) {
            $('#form-save').trigger('reset');
            resetValidationError();
        });
        $('#facility-file').on('change', function (e) {
          let file = $('#facility-file')[0].files[0]
          let ukuran = file.size;
          let name = file.name;
          let type = file.type;
          var allowtypes = ['image/jpeg', 'image/jpg', 'image/png'];

          if (e.target.files.length > 0) {
            if(jQuery.inArray(type, allowtypes) >= 0 && ukuran <= 2000000){
                let newName = (name.length > 40) ? name.substr(-30):name;
                $('#facility-file-name').val('img-'+newName);	
                $('#facility-file-name-label').html('img-'+newName);
                if($('#btn-remove-img').length <= 0){
                    let btnRemoveImg = `<a id="btn-remove-img" onclick="removeImg(this)" 
                        class="btn btn-sm btn-outline-secondary btn-icon"> <span class="tf-icons bx bx-trash"></span></a>`;
                    $('#facility-file').parent().append(btnRemoveImg);
                }
            }else{
                if(jQuery.inArray(type, allowtypes) < 0) {
                    showToast('warning','Peringatan','Tipe file tidak diijinkan!','#toast-alert');
                }else if(ukuran > 2000000){
                    showToast('warning','Peringatan','File tidak boleh lebih dari 2MB','#toast-alert');
                }
                $('#facility-file-name-label').html("Tidak ada gambar yang dipilih");
                $('#facility-file').val('');
                removeImg('#btn-remove-img');
            }
          }
        })
        
        function removeImg(img){
            $('#facility-file-name-label').html("Tidak ada gambar yang dipilih");
            $('#facility-file').val('');
            $('#facility-file-name').val('');
            $(img).remove();
        }
        function addData(){
            $('#form-save .modal-title').text("Tambah Data");
            $('#form-save').attr('tipe','add');
            removeImg('#btn-remove-img');
        }
        function editData(id){
            $('#form-save .modal-title').text("Edit Data");
            $('#form-save').attr('tipe','edit');
            let urlDetail = '<?= site_url('admin/fasilitas/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    $('#form-save').find('#id_facility').val(data.id_facility);
                    $('#form-save').find('input[name="name_facility"]').val(data.name_facility);
                    $('#form-save').find('input[name="qty_facility"]').val(parseInt(data.qty_facility));
                    $('#form-save').find('input[name="price"]').val(parseInt(data.price));
                    
                    if(checkIsNotEmptyNullValue(data.thumb_facility)){
                        $('#form-save').find('input[name="facility_file_name"]').val(data.thumb_facility);
                        $('#form-save').find('#facility-file-name-label').text(data.thumb_facility);
                    }
                    
                    if($('#btn-remove-img').length < 1 && checkIsNotEmptyNullValue(data.thumb_facility)){
                        let btnRemoveImg = `<a id="btn-remove-img" onclick="removeImg(this)" 
                            class="btn btn-sm btn-outline-secondary btn-icon"> <span class="tf-icons bx bx-trash"></span></a>`;
                        $('#facility-file').parent().append(btnRemoveImg);
                    }
                    $('#modal-save').modal('show');
                }
            });
        }
        function detailData(id){
            let urlDetail = '<?= site_url('admin/fasilitas/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    $('#form-detail').find('span#name_facility').text(data.name_facility);
                    $('#form-detail').find('span#qty_facility').text(`${data.qty_facility} PCS`);
                    $('#form-detail').find('span#price').text(`${formatRupiah(data.price)} / menit`);
                    $('#form-detail').find('#thumb_facility').html(
                        `<img class="img-fluid rounded" src="${urlPathThumb}/${data.thumb_facility}" alt="">`);

                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/fasilitas/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
    </script>
<?= $this->endSection('extrascript'); ?>
