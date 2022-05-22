<?= $this->extend('templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">staff /</span> Data User</h4>

    <!-- Striped Rows -->
    <div class="card">
    <div class="card-header row justify-content-between">
        <div class="col">
            <h5 class="mt-2">Tabel Data User</h5>
        </div>
        <div class="col-auto">
            <a href="<?= site_url('staff/add/user'); ?>"class="btn btn-dark btn-md rounded-3" title="Detail Data">
                Tambah User <i class="bx bx-sm bxs-plus-circle"></i></a>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-striped table-responsive" id="datatable-users">
        <thead>
            <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0"></tbody>
        </table>
    </div>
    </div>
    <!--/ Striped Rows -->
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
        var urlDetail = "<?php echo site_url('staff/detail/user/'.':id') ?>";
        var urlEdit = "<?php echo site_url('staff/edit/user/'.':id') ?>";
        $(document).ready(function() {
            var userTable = $('#datatable-users').DataTable({
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
                        "data": "id_user",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        'data': 'name',
                        'className': "text-left",
                        'orderable': false,
                    },
                    {
                        'data': 'email',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'role',
                        'className': "text-center",
                        'orderable': false,
                    },
                    {
                        'data': 'id_user',
                        'className':"text-center",
                        'orderable': false,
                        render: function(data, type, row, meta) {
                            return `<a href="${urlDetail.replace(':id',data)}" class="btn btn-primary btn-sm rounded-3" title="Detail Data"> 
                                <i class="bx bxs-detail me-1"></i></a>
                                <a href="${urlEdit.replace(':id',data)}" class="btn btn-warning btn-sm rounded-3" title="Edit Data"> 
                                <i class="bx bx-edit-alt me-1"></i></a>
                                <a href="" class="btn btn-danger btn-sm rounded-3" title="Hapus Data" 
                                onclick="hapusData('${data}')"><i class="bx bx-trash me-1"></i></a>`;
                        }
                    },
                ],
                "ajax": {
                    "url": "<?php echo site_url('staff/user/getdata') ?>",
                    "type": "POST",
                    'data': function(data) {
                        console.log(data);
                    }
                }
            });
            userTable.on('draw', function () {
                // $('.paginate_button.previous').html('<i class="btn btn-light btn-md fa fa-arrow-left mr-1 purple-50" style="border-radius: 0.75rem; background-color: white;"></i>');
                // $('.paginate_button.next').html('<i class="btn btn-light btn-md fa fa-arrow-right ml-1 mr-3 purple-50" style="border-radius: 0.75rem; background-color: white"></i>');
                var total_records = userTable.rows().count();
                var page_length = userTable.page.info().length;
                var total_pages = Math.ceil(total_records / page_length);
                var current_page = userTable.page.info().page+1;
            });
        }); 

        function hapusData(id){
            $("#confirm-dialog").modal('show');
        }
    </script>
<?= $this->endSection('extrascript'); ?>