<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/datatables/datatables.min.css'); ?>
    <?= link_tag('assets/vendor/libs/select2/css/select2.min.css'); ?>
    <?= link_tag('assets/vendor/libs/select2/css/select2bootstrap.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">umum /</span> Data Labroom </h4>
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
            <h5 class="mt-2">Data Labroom</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-dark rounded-3" onclick="addData()"
                data-bs-toggle="modal" data-bs-target="#modal-save">
                Tambah Lab <i class="bx bx-sm bxs-plus-circle"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-wrap">
        <table class="table table-striped table-responsive" id="datatable-labroom">
        <thead>
            <tr>
            <th>No.</th>
            <th style="width: 15%;">Kategori</th>
            <th style="width: 15%;">Nama Lab</th>
            <th>Kapasitas</th>
            <th style="width: 20%;">Fasilitas</th>
            <th>Riwayat</br> Pemakaian</th>
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
    <div class="modal-dialog modal-lg sld-up" role="document">
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
                    <label for="code" class="col-sm-4">Kategori Lab</label>
                    <div class="col-sm-8">
                        <span id="name_category"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-4">Nama Lab</label>
                    <div class="col-sm-8">
                        <span id="name_lab"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-4">Kapasitas</label>
                    <div class="col-sm-8">
                        <span id="capacity"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent" class="col-sm-4">Deskripsi</label>
                    <div class="col-sm-8">
                        <span id="desc_lab"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-4">Daftar Fasilitas</label>
                    <div class="col-sm-8" id="list_facility">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="code" class="col-sm-4">Harga Sewa/jam</label>
                    <div class="col-sm-8">
                        <span id="price_total"></span>
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
        <input type="hidden" id="id_lab"/>
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
                    <label for="category_data" class="form-label">Kategori Lab</label>
                    <select class="form-control js-example-basic-single" 
                        id="category_data" name="category_data" style="width: 100%;"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="name_lab" class="form-label">Nama Lab</label>
                    <input type="text" class="form-control" name="name_lab" id="name_lab" 
                    placeholder="Masukkan nama lab (cth: lab soft engineering a)"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="capacity" class="form-label">Kapasitas</label>
                    <div class="input-group">
                        <input type="number" id="capacity" class="form-control" 
                        placeholder="Masukkan kapasitas (cth: 50)" name="capacity"/>
                        <span class="input-group-text">Kursi</span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="desc_lab" class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="3" 
                    placeholder="Masukkan deskripsi lab" name="desc_lab" id="desc_lab"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                    <label for="facitlity_data" class="form-label">Daftar Fasilitas</label>
                    <select class="form-control js-select2" id="facility_data"
                        name="facility_data[]" multiple style="width: 100%">
                    </select>
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
</div>
<style type="text/css">
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <?= script_tag('assets/vendor/libs/select2/js/select2.full.min.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        $(function () {
          $('.js-example-basic-single').select2({
            placeholder: "Pilih kategori",
            allowClear: true,
            theme: "bootstrap",
            dropdownParent: $('#modal-save'),
          });
          $('.js-select2').select2({
            placeholder: "Pilih fasilitas",
            allowClear: true,
            theme: "bootstrap",
            dropdownParent: $('#modal-save'),
          });
        })
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
            var labroomTable = $('#datatable-labroom').DataTable({
                "defRender":true,
                "language": {
                    "search": "_INPUT_",
                    "searchPlaceholder": "Cari di sini...",
                    "emptyTable": "Data labroom masih kosong",
                    "zeroRecords": "Data labroom kosong"
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
                        "data": "id_lab",
                        'className':'text-center',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'category_id',
                        'className': "text-left",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            return `<b>${row.name_category}</b>`;
                        }
                    },
                    {
                        'data': 'name_lab',
                        'className': "text-left",
                        'orderable': true,
                    },
                    {
                        'data': 'capacity',
                        'className': "text-center",
                        'orderable': true,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 'booked')? 'warning':'success';
                            return `${data} kursi`;
                        }
                    },
                    {
                        'data': 'list_facility',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'id_lab',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `<button type="button" class="btn btn-sm btn-outline-secondary">
                             Timeline
                            </button>`;
                        }
                    },
                    {
                        'data': 'id_lab',
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
                    "url": "<?php echo site_url('admin/list-labrooms/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        data.csrf_token_name = tokenHash;
                    }
                }
            });
            labroomTable.on('draw', function () {
                var total_records = labroomTable.rows().count();
                var page_length = labroomTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = labroomTable.page.info().page+1;
            });

            $('#form-save').submit(function(e){
                e.preventDefault();
                let siteUrl = "<?= site_url('admin/list-labrooms'); ?>";
                let formData = new FormData(this);
                let idLab = $('#form-save').find('#id_lab').val();
                let urlPost =  ($(this).attr('tipe') == 'add') ? 
                    `${siteUrl}/insert`: `${siteUrl}/update/${idLab}`;
                resetValidationError(); // agar bisa mengambil kondisi field terbaru
                console.log(urlPost);
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
                            labroomTable.draw();
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
                            labroomTable.draw();
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

        function addCategoryList(itemSelected=''){
            let category_data = [];
            let urlGetList = "<?= site_url('admin/list-labrooms/getlist/categories'); ?>";
            $('#category_data').html('');
            $('#category_data').append('');
            $.ajax({
                type: 'GET',
                url: urlGetList,
                success: function(response){ 
                    var data = JSON.parse(response);
                    for(var i=0;i<data.length; i++){
                        var category = data[i].id_category;
                        category_data.push(category)
                        var opt = new Option(data[i].name_category,category);
                        if(itemSelected == category){
                            opt.selected=true;
                        }
                        $('#category_data').append(opt);
                    }
                },error: function(){
                    showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                }
            });
        }
        function addFacilityList(itemSelected = []){
            let facility_data = [];
            let urlGetList = "<?= site_url('admin/list-labrooms/getlist/facilities'); ?>";
            $('#facility_data').html('');
            $('#facility_data').append('');
            $.ajax({
                type: 'GET',
                url: urlGetList,
                success: function(response){ 
                    var data = JSON.parse(response);
                    for(var i=0;i<data.length; i++){
                        var facility = data[i].id_facility;
                        facility_data.push(facility)
                        var opt = new Option(data[i].name_facility,facility);
                        if(jQuery.inArray(facility, itemSelected) >= 0){
                            opt.selected=true;
                        }
                        $('#facility_data').append(opt);
                    }
                },error: function(){
                    showToast('danger','Peringatan','Gagal! Database server error','#toast-alert');
                }
            });
        }

        function addData(){
            $('#form-save .modal-title').text("Tambah Data");
            $('#form-save').attr('tipe','add');
            addCategoryList();
            addFacilityList([]);
        }
        function editData(id){
            $('#form-save .modal-title').text("Edit Data");
            $('#form-save').attr('tipe','edit');
            let urlDetail = '<?= site_url('admin/list-labrooms/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    $('#form-save').find('#id_lab').val(data.id_lab);
                    $('#form-save').find('input#name_category').val(data.name_category);
                    $('#form-save').find('input#name_lab').val(data.name_lab);
                    $('#form-save').find('input#capacity').val(data.capacity);
                    $('#form-save').find('textarea#desc_lab').val(data.desc_lab);
                    let listIdFacility = data.list_facility.map(el => {
                        return el.id_facility.toString();
                    });
                    addCategoryList(data.category_id);
                    addFacilityList(listIdFacility);

                    $('#modal-save').modal('show');
                }
            });
        }
        function detailData(id){
            let urlDetail = '<?= site_url('admin/list-labrooms/detail/:id'); ?>';
            $.ajax({
                type:'GET',
                url: urlDetail.replace(':id',id),
                success:function(response){
                    var data = JSON.parse(response);
                    var descLab = (!checkIsNotEmptyNullValue(data.desc_lab)) ? '-':data.desc_lab;
                    $('#form-detail').find('span#name_category').text(data.name_category);
                    $('#form-detail').find('span#name_lab').text(data.name_lab);
                    $('#form-detail').find('span#status').text(data.status_lab);
                    $('#form-detail').find('span#capacity').text(`${data.capacity} kursi`);
                    $('#form-detail').find('span#desc_lab').text(descLab);
                    let strHead = '<ul class="list-group">';
                    let strFoot ='</ul>';
                    let strBody = '';
                    let dataFacility = data.list_facility;
                    let totalPrice = 0;
                    for(var i=0; i<dataFacility.length; i++){
                        totalPrice += parseInt(dataFacility[i].price);
                        strBody += '<li class="list-group-item d-flex justify-content-between align-items-center">'+
                            dataFacility[i].name_facility+ ' ('+dataFacility[i].qty_facility+' pcs) '+
                            '<span class="badge bg-secondary">'+formatRupiah(dataFacility[i].price)+'</span></li>';
                    }
                    strBody += '<li class="list-group-item d-flex justify-content-between align-items-left">'+
                            '<b>Total</b>'+
                            '<span class="badge bg-primary">'+formatRupiah(totalPrice)+'</span></li>';
                    let strHtmlFacility = strHead+strBody+strFoot;
                    let strCalculation =`${formatRupiah(totalPrice)} x 60 menit = ${formatRupiah(totalPrice*60)}`;
                    $('#form-detail').find('span#price_total').text(strCalculation);
                    $('#form-detail').find('#list_facility').html(strHtmlFacility);
                    $('#modal-detail').modal('show');
                }
            });
        }

        function hapusData(id){
            let urlDelete = "<?= site_url('admin/list-labrooms/delete/:id'); ?>";
            $("#confirm-delete").modal('show');
            $('#confirm-delete').find('form').attr('action',urlDelete.replace(':id', id));
        }
    </script>
<?= $this->endSection('extrascript'); ?>
