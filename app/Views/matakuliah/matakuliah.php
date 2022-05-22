<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Matakuliah /</span> Daftar Matakuliah</h4>

    <!-- Striped Rows -->
    <div class="card">
    <div class="card-header row justify-content-between">
        <div class="col">
            <h5 class="mt-2">Tabel Data Matakuliah</h5>
        </div>
        <div class="col-auto">
            <button  type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#modal-add">
            Tambah Matakuliah <i class="bx bx-sm bxs-plus-circle"></i>
            </button>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped table-responsive" id="datatable-makul">
        <thead>
            <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama MK (ID</th>
            <th>Nama MK (EN)</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
    </div>
    <!--/ Striped Rows -->
</div>
<!-- Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="" method="" id="form-add">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Tambah Matakuliah</h5>
            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
            ></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col mb-3">
                <label for="kode_makul" class="form-label">Kode Makul</label>
                <input type="text" class="form-control" name="kode_makul" id="kode_makul" disabled readonly/>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="name" class="form-label">Nama Makul (ID)</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Matakuliah dalam Bahasa Indonesia "/>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                <label for="name_en" class="form-label">Nama Makul (EN)</label>
                <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Matakuliah dalam Bahasa Inggris "/>
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="sks" class="form-label">SKS</label>
                    <div class="input-group input-group-merge">
                        <input type="number" id="sks" class="form-control" placeholder="1" name="sks"/>
                        <span class="input-group-text">SKS</span>
                    </div>
                </div>
                <div class="col mb-0">
                    <label for="semester" class="form-label">Semester</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">Semester ke-</span>
                        <input type="number" id="semester" class="form-control" placeholder="1" name="semester"/>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
    </div>
</div>
<div class="modal fade" id="confirm-dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi Hapus</h5>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
        ></button>
        </div>
        <div class="modal-body">   
            <h2 class="h2">Are you sure?</h2>
            <p>The data will be deleted and lost forever</p> 
        </div>    
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="button" id="delete-button" class="btn btn-danger">Delete</button>
        </div>
    </div>
    </div>
</div>
<style type="text/css">
.dataTables_filter,.dataTables_length{
    padding: 20px!important;
}
.wrapper{
    display: flex!important;
    justify-content: space-between;
    padding:20px;
}
</style>
<?= $this->endSection('content'); ?>
<?= $this->section('extrascript'); ?>
    <script src="<?= base_url('assets/vendor/libs/datatables/datatables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/ui-modals.js'); ?>"></script>
    <script type="text/javascript">
        function gen_rand_kode(){
            return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        }
        var kode = gen_rand_kode();
            kode = 'mk-'+kode.substr(0,7).toLocaleLowerCase();
        $('#modal-add').find('input[name="kode_makul"]').val(kode);
        $(document).ready(function() {
            var matakuliahTable = $('#datatable-makul').DataTable({
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
                        "data": "id_makul",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'kode_makul',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'name',
                        'className': "text-left",
                        'orderable': false,
                    },
                    {
                        'data': 'name_en',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'id_makul',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            return `<button class="btn btn-primary btn-sm rounded-3" > 
                                <i class="bx bxs-detail me-1" onclick="detailData('${row.id_makul}')"></i></button>
                                <a href="" class="btn btn-warning btn-sm rounded-3" title="Edit Data"> 
                                <i class="bx bx-edit-alt me-1"></i></a>
                                <button class="btn btn-danger btn-sm rounded-3" onclick="hapusData('${row.id_makul}')">
                                <i class="bx bx-trash me-1"></i></button>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('matakuliah/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        console.log(data);
                    }
                }
            });
            matakuliahTable.on('draw', function () {
                // $('.paginate_button.previous').html('<i class="btn btn-light btn-md fa fa-arrow-left mr-1 purple-50" style="border-radius: 0.75rem; background-color: white;"></i>');
                // $('.paginate_button.next').html('<i class="btn btn-light btn-md fa fa-arrow-right ml-1 mr-3 purple-50" style="border-radius: 0.75rem; background-color: white"></i>');
                var total_records = matakuliahTable.rows().count();
                var page_length = matakuliahTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = matakuliahTable.page.info().page+1;
            });
            
            $('#form-add').submit(function(e){
                e.preventDefault();
            });
        }); 

        var urlDetail = "<?php echo site_url('matakuliah/detail/'.':id') ?>";
        function detailData(id){
            let url = urlDetail.replace(':id',id);
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(data);
                }
            });
        }

        function hapusData(id){
            id.preventDefault();
            $("#confirm-dialog").modal('show');
        }
    </script>
<?= $this->endSection('extrascript'); ?>