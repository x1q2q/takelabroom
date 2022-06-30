<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/fullcalendar/fullcalendar.min.css'); ?>
    <?= link_tag('assets/vendor/css/app-calendar.css'); ?>
    <?= link_tag('assets/vendor/css/fullcalendar.css'); ?>
    <?= link_tag('assets/vendor/libs/fontawesome/css/all.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y app-calendar-content">
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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">reservasi /</span> Jadwal Reservasi </h4>
    <!-- Striped Rows -->
    <div class="card">
        <div class="card-header p-3 bg-info">
            <div class="col nopadding">
             <h5 class="nopadding text-white">Jadwal Reservasi</h5>
            </div>
        </div>
        <div class="card-body border-top">
            <div id="calendar" class="mt-3"></div>
        </div>
    </div>
    <!--/ Striped Rows -->
</div>
<!-- modal detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered sld-up" role="document">
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
<style type="text/css">
</style>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/moment/moment.min.js'); ?>
    <?= script_tag('assets/vendor/libs/fullcalendar/fullcalendar.min.js'); ?>
    <?= script_tag('assets/vendor/js/calendar-event.js'); ?>
    <script type="text/javascript">
        var tokenHash = $('meta[name="<?= csrf_token() ?>"]').attr('content');
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': tokenHash
                }
            });
            // fullcalender
            var calendarEl = $('#calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'Asia/Jakarta',
                themeSystem: 'bootstrap4',
                header: {
                    left:'prev,next today',
                    center: 'title',
                    right:'month,agendaWeek,agendaDay'
                },
                dayMaxEvents: true,
                displayEventTime: false,
                events: {
                    url: "<?= site_url('admin/schedule-reservation/getschedule'); ?>",
                    error: function() {
                        showToast('danger','Peringatan','Gagal mengambil data','#toast-alert');
                    },
                    success: function(){
                        // showToast('success','Sukses','Berhasil mengambil data jadwal','#toast-alert');
                        console.log('berhasil');
                    }
                },
                eventRender(event, element) {
                    if(event.status == "verified") {
                        element.css('background-color', '#71dd37');
                    }else if(event.status == "cancelled"){
                        element.css('background-color', '#ff3e1d');
                    }else if(event.status == "pending"){
                        element.css('background-color', '#ffab00');
                    }else if(event.status == "finished"){
                        element.css('background-color', '#696cff');
                    }
                    element.on('click', e => {
                        e.preventDefault();
                        $.ajax({
                            type:'GET',
                            url: event.url,
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
                    });
                }
            });

            calendar.render();
        });
    </script>
<?= $this->endSection('extrascript'); ?>
