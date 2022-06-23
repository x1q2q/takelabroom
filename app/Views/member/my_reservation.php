<?= $this->extend('member/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mx-3 mb-4"><span class="text-muted fw-light">
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
                <th>Ruang Lab</th>
                <th>Harga Sewa</th>
                <th>Rentang Waktu</th>
                <th>Status</th>
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
<style type="text/css">

</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
<?= script_tag('assets/vendor/libs/datatables/datatables.min.js'); ?>
    <?= script_tag('assets/js/ui-modals.js'); ?>
    <?= script_tag('assets/vendor/libs/timepicker/jquery.timepicker.min.js'); ?>
    
    <?php if(false): ?>
        <script type="text/javascript">
            showToast('danger','Peringatan','gagal wa','#toast-alert');
        </script>
    <?php endif; ?>

    <?php if(true): ?>
        <script type="text/javascript">
            showToast('success','Sukses','berhasil kye','#toast-alert');
        </script>
    <?php endif; ?>

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
                "searching": false,
                "language": {
                    "emptyTable": "Belum ada riwayat reservasi",
                    "zeroRecords": "Belum ada riwayat reservasi"
                },
                "dom": '<"wrapper m-2 bg-label-secondary p-1"lf>rt<"wrapper rounded-3 bg-label-dark"<i><"row align-items-center"<""><p>>>',
                "processing": true,
                "serverSide": true,
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
                        'orderable': false,
                    },
                    {
                        'data': 'total_payment',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return (checkIsNotEmptyNullValue(data)) ? 
                                `<b>${formatRupiah(data)}</b>`:'<b>Rp0</b>';
                        }
                    },
                    {
                        'data': 'range_time',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            return `(${row.time_start} - ${row.time_end})<br/> ${row.date_booking}`;
                        }
                    },
                    {
                        'data': 'status_reserv',
                        'className': "text-center",
                        'orderable': false,
                        render: function (data, type, row, meta) {
                            let labelStatus = (data == 'cancelled') ? 'danger' : (data == 'finished') 
                                ? 'primary': (data == 'verified') ? 'success' : 'warning' ;
                            let label = `<span class="badge bg-label-${labelStatus} me-1">${data}</span>`;

                            return label;
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
                            return `<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);" onclick="detailData(${data})"><i class="bx bxs-detail me-1"></i> Detail</a>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="cancelData(${data})"><i class="bx bxs-minus-circle me-1"></i> Cancel</a>
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
        });
    </script>
<?= $this->endSection('extrascript'); ?>
