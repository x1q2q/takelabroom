<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">labroom /</span> Kategori </h4>
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
            <h5 class="mt-2">Data Kategori Lab</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-dark rounded-3" onclick="addData()"
            data-bs-toggle="modal" data-bs-target="#modal-save">
                Tambah Kategori <i class="bx bx-sm bxs-plus-circle"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-categories">
        <thead>
            <tr>
            <th>No.</th>
            <th style="width:25%">Nama Kategori</th>
            <th style="width:30%">Deskripsi</th>
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
                    <label for="code" class="col-sm-4">Nama Kategory</label>
                    <div class="col-sm-8">
                        <span id="name_category"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent" class="col-sm-4">Deskripsi</label>
                    <div class="col-sm-8">
                        <span id="desc_category"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-4">Slug URL</label>
                    <div class="col-sm-8">
                        <span id="slug"></span>
                    </div>
                </div>	
                <div class="form-group row">	
                    <label for="thumb_category" class="col-sm-4">Thumbnail</label>	
                    <div class="col-sm-8">	
                        <div id="thumb_category">
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
        <input type="hidden" id="id_category"/>
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
                    <label for="name_category" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="name_category" id="name_category" 
                    placeholder="Masukkan nama kategori (cth: lab soft.eng)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="desc_category" class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="3" placeholder="Masukkan deskripsi kategori"
                        name="desc_category" id="desc_category"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="thumb_category" class="form-label">Thumbnail</label>
                        <div class="custom-file border-bottom p-2" id="thumb_category">
                            <input type="file" name="thumb_category" hidden class="form-control" accept=".png,.jpg,.jpeg" id="category-file">
                            <input type="text" name="category_file_name" value="" class="form-control" hidden id="category-file-name" >
                            <label class="btn-secondary btn" for="category-file" style="padding: 4px 10px">
                            <span class="tf-icons bx bxs-image-add"></span>
                                Pilih </label>
                            <label id="category-file-name-label" for="category-file">Tidak ada gambar yang dipilih</label>
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

<style type="text/css">
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        var urlPathThumb = "<?= base_url('assets/img/uploads/categories/'); ?>";
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
            var kategoriTable = $('#datatable-categories').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari di sini...",
                    "emptyTable": "Data kategori masih kosong",
                    "zeroRecords": "Data kategori kosong"
                },
                "dom": '<"wrapper m-2 bg-label-secondary p-1"lf>rt<"wrapper rounded-3 bg-label-dark"<i><"row align-items-center"<""><p>>>',
                "processing": true,
                "serverSide": true,
                "order": [
                    [0, "desc"]
                ],
                "columns": [
                    {
                        "data": "id_category",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'name_category',
                        'className': "text-left",
                        'orderable': true,
                    },
                    {
                        'data': 'desc_category',
                        'className': "text-center",
                        'orderable': true,
                    },
                    {
                        'data': 'thumb_category',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `<img src="${urlPathThumb+'/'+data}" class="img-fluid img-thumb rounded img-avatar">`;
                        }
                    },
                    {
                        'data': 'id_category',
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
                    "url": "<?php echo site_url('admin/kategori/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            kategoriTable.on('draw', function () {
                var total_records = kategoriTable.rows().count();
                var page_length = kategoriTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = kategoriTable.page.info().page+1;
            });

            $('#form-save').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('admin/kategori/'); ?>";
                let formData = new FormData(this);
                let idCategory = $('#form-save').find('#id_category').val();
                let urlPost =  ($(this).attr('tipe') == 'add') ? 
                    `${siteUrl}/insert`: `${siteUrl}/update/${idCategory}`;
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
                            kategoriTable.draw();
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
                            kategoriTable.draw();
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
        $('#category-file').on('change', function (e) {
          let file = $('#category-file')[0].files[0]
          let ukuran = file.size;
          let name = file.name;
          let type = file.type;
          var allowtypes = ['image/jpeg', 'image/jpg', 'image/png'];

          if (e.target.files.length > 0) {
            if(jQuery.inArray(type, allowtypes) >= 0 && ukuran <= 2000000){
                let newName = (name.length > 40) ? name.substr(-30):name;
                $('#category-file-name').val('img-'+newName);	
                $('#category-file-name-label').html('img-'+newName);
                if($('#btn-remove-img').length <= 0){
                    let btnRemoveImg = `<a id="btn-remove-img" onclick="removeImg(this)" 
                        class="btn btn-sm btn-outline-secondary btn-icon"> <span class="tf-icons bx bx-trash"></span></a>`;
                    $('#category-file').parent().append(btnRemoveImg);
                }
            }else{
                if(jQuery.inArray(type, allowtypes) < 0) {
                    showToast('warning','Peringatan','Tipe file tidak diijinkan!','#toast-alert');
                }else if(ukuran > 2000000){
                    showToast('warning','Peringatan','File tidak boleh lebih dari 2MB','#toast-alert');
                }
                $('#category-file-name-label').html("Tidak ada gambar yang dipilih");
                $('#category-file').val('');
                removeImg('#btn-remove-img');
            }
          }
        })
        
        function removeImg(img){
            $('#category-file-name-label').html("Tidak ada gambar yang dipilih");
            $('#category-file').val('');
            $('#category-file-name').val('');
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
            let urlDetail = '<?= site_url('admin/kategori/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    $('#form-save').find('#id_category').val(data.id_category);
                    $('#form-save').find('input[name="name_category"]').val(data.name_category);
                    $('#form-save').find('textarea[name="desc_category"]').val(data.desc_category);
                    
                    if(checkIsNotEmptyNullValue(data.thumb_category)){
                        $('#form-save').find('input[name="category_file_name"]').val(data.thumb_category);
                        $('#form-save').find('#category-file-name-label').text(data.thumb_category);
                    }
                    
                    if($('#btn-remove-img').length < 1 && checkIsNotEmptyNullValue(data.thumb_category)){
                        let btnRemoveImg = `<a id="btn-remove-img" onclick="removeImg(this)" 
                            class="btn btn-sm btn-outline-secondary btn-icon"> <span class="tf-icons bx bx-trash"></span></a>`;
                        $('#category-file').parent().append(btnRemoveImg);
                    }
                    $('#modal-save').modal('show');
                }
            });
        }
        function detailData(id){
            let urlDetail = '<?= site_url('admin/kategori/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    $('#form-detail').find('span#name_category').text(data.name_category);
                    $('#form-detail').find('span#slug').text(data.slug);
                    $('#form-detail').find('span#desc_category').text(data.desc_category);
                    $('#form-detail').find('#thumb_category').html(
                        `<img class="img-fluid rounded" src="${urlPathThumb}/${data.thumb_category}" alt="">`);

                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/kategori/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
    </script>
<?= $this->endSection('extrascript'); ?>
