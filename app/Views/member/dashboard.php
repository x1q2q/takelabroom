<?= $this->extend('member/templates/main'); ?>

<?= $this->section('extracss'); ?>
    <?= link_tag('assets/vendor/libs/fullcalendar/fullcalendar.min.css'); ?>
    <?= link_tag('assets/vendor/css/app-calendar.css'); ?>
    <?= link_tag('assets/vendor/css/fullcalendar.css'); ?>
    <?= link_tag('assets/vendor/libs/fontawesome/css/all.min.css'); ?>
<?= $this->endSection('extracss'); ?>

<?= $this->section('content'); ?>
<div class="bs-toast toast toast-placement-ex top-0 start-50 m-3 sld-down"
  role="alert"
  aria-live="assertive"
  aria-atomic="true"
  data-delay="3000"
  id="toast-alert">
  <div class="toast-header">
      <i class="bx bx-bell me-2"></i>
      <div class="me-auto fw-semibold toast-title"></div>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body"></div>
</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-lg-4 col-sm-12 order-0 mb-4">
        <div class="card mb-4">
            <div class="card-header border-bottom p-3">
                <h5 class="card-title text-primary nopadding">Selamat sore member</h5>
            </div>
            <div class="card-body row pt-2">
                <div class="col-6">
                    <p class="mb-4">
                    Kamu telah mengubah data profile anda
                    </p>
                </div>
                <div class="col-6 text-center text-sm-left">
                    <img
                    src="<?= base_url('assets/img/illustrations/girl-doing-yoga-light.png'); ?>"
                    height="500"
                    class="img-fluid"
                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                    data-app-light-img="illustrations/man-with-laptop-light.png"
                    />
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Jumlah Laboratorium PTIK</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                    <h3 class="mb-0">$84,686k</h3>
                    </div>
                </div>
                <div id="profileReportChart" style="min-height: 80px;"><div id="apexchartssnavqlmm" class="apexcharts-canvas apexchartssnavqlmm apexcharts-theme-light" style="width: 163px; height: 80px;"><svg id="SvgjsSvg3900" width="163" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG3902" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs3901"><clipPath id="gridRectMasksnavqlmm"><rect id="SvgjsRect3907" width="164" height="85" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasksnavqlmm"></clipPath><clipPath id="nonForecastMasksnavqlmm"></clipPath><clipPath id="gridRectMarkerMasksnavqlmm"><rect id="SvgjsRect3908" width="159" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter3914" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood3915" flood-color="#ffab00" flood-opacity="0.15" result="SvgjsFeFlood3915Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite3916" in="SvgjsFeFlood3915Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite3916Out"></feComposite><feOffset id="SvgjsFeOffset3917" dx="5" dy="10" result="SvgjsFeOffset3917Out" in="SvgjsFeComposite3916Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur3918" stdDeviation="3 " result="SvgjsFeGaussianBlur3918Out" in="SvgjsFeOffset3917Out"></feGaussianBlur><feMerge id="SvgjsFeMerge3919" result="SvgjsFeMerge3919Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode3920" in="SvgjsFeGaussianBlur3918Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode3921" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend3922" in="SourceGraphic" in2="SvgjsFeMerge3919Out" mode="normal" result="SvgjsFeBlend3922Out"></feBlend></filter></defs><line id="SvgjsLine3906" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG3923" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG3924" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG3932" class="apexcharts-grid"><g id="SvgjsG3933" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine3935" x1="0" y1="0" x2="155" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3936" x1="0" y1="20" x2="155" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3937" x1="0" y1="40" x2="155" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3938" x1="0" y1="60" x2="155" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3939" x1="0" y1="80" x2="155" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG3934" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine3941" x1="0" y1="80" x2="155" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine3940" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG3909" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG3910" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath3913" d="M 0 76C 10.85 76 20.15 12 31 12C 41.85 12 51.15 62 62 62C 72.85 62 82.15 22 93 22C 103.85 22 113.15 38 124 38C 134.85 38 144.15 6 155 6" fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMasksnavqlmm)" filter="url(#SvgjsFilter3914)" pathTo="M 0 76C 10.85 76 20.15 12 31 12C 41.85 12 51.15 62 62 62C 72.85 62 82.15 22 93 22C 103.85 22 113.15 38 124 38C 134.85 38 144.15 6 155 6" pathFrom="M -1 120L -1 120L 31 120L 62 120L 93 120L 124 120L 155 120"></path><g id="SvgjsG3911" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle3947" r="0" cx="0" cy="0" class="apexcharts-marker weq2blt95 no-pointer-events" stroke="#ffffff" fill="#ffab00" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG3912" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine3942" x1="0" y1="0" x2="155" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3943" x1="0" y1="0" x2="155" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG3944" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG3945" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG3946" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect3905" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG3931" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG3903" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 40px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 171, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 301px; height: 117px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3" style="position: relative;">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Total Reservasi Anda</h5>
                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                    </div>
                    <div class="mt-sm-auto">
                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i> 68.2%</small>
                    <h3 class="mb-0">$84,686k</h3>
                    </div>
                </div>
                <div id="profileReportChart" style="min-height: 80px;"><div id="apexchartssnavqlmm" class="apexcharts-canvas apexchartssnavqlmm apexcharts-theme-light" style="width: 163px; height: 80px;"><svg id="SvgjsSvg3900" width="163" height="80" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG3902" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs3901"><clipPath id="gridRectMasksnavqlmm"><rect id="SvgjsRect3907" width="164" height="85" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMasksnavqlmm"></clipPath><clipPath id="nonForecastMasksnavqlmm"></clipPath><clipPath id="gridRectMarkerMasksnavqlmm"><rect id="SvgjsRect3908" width="159" height="84" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><filter id="SvgjsFilter3914" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%"><feFlood id="SvgjsFeFlood3915" flood-color="#ffab00" flood-opacity="0.15" result="SvgjsFeFlood3915Out" in="SourceGraphic"></feFlood><feComposite id="SvgjsFeComposite3916" in="SvgjsFeFlood3915Out" in2="SourceAlpha" operator="in" result="SvgjsFeComposite3916Out"></feComposite><feOffset id="SvgjsFeOffset3917" dx="5" dy="10" result="SvgjsFeOffset3917Out" in="SvgjsFeComposite3916Out"></feOffset><feGaussianBlur id="SvgjsFeGaussianBlur3918" stdDeviation="3 " result="SvgjsFeGaussianBlur3918Out" in="SvgjsFeOffset3917Out"></feGaussianBlur><feMerge id="SvgjsFeMerge3919" result="SvgjsFeMerge3919Out" in="SourceGraphic"><feMergeNode id="SvgjsFeMergeNode3920" in="SvgjsFeGaussianBlur3918Out"></feMergeNode><feMergeNode id="SvgjsFeMergeNode3921" in="[object Arguments]"></feMergeNode></feMerge><feBlend id="SvgjsFeBlend3922" in="SourceGraphic" in2="SvgjsFeMerge3919Out" mode="normal" result="SvgjsFeBlend3922Out"></feBlend></filter></defs><line id="SvgjsLine3906" x1="0" y1="0" x2="0" y2="80" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="80" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG3923" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG3924" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG3932" class="apexcharts-grid"><g id="SvgjsG3933" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine3935" x1="0" y1="0" x2="155" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3936" x1="0" y1="20" x2="155" y2="20" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3937" x1="0" y1="40" x2="155" y2="40" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3938" x1="0" y1="60" x2="155" y2="60" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine3939" x1="0" y1="80" x2="155" y2="80" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG3934" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine3941" x1="0" y1="80" x2="155" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine3940" x1="0" y1="1" x2="0" y2="80" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG3909" class="apexcharts-line-series apexcharts-plot-series"><g id="SvgjsG3910" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath3913" d="M 0 76C 10.85 76 20.15 12 31 12C 41.85 12 51.15 62 62 62C 72.85 62 82.15 22 93 22C 103.85 22 113.15 38 124 38C 134.85 38 144.15 6 155 6" fill="none" fill-opacity="1" stroke="rgba(255,171,0,0.85)" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-line" index="0" clip-path="url(#gridRectMasksnavqlmm)" filter="url(#SvgjsFilter3914)" pathTo="M 0 76C 10.85 76 20.15 12 31 12C 41.85 12 51.15 62 62 62C 72.85 62 82.15 22 93 22C 103.85 22 113.15 38 124 38C 134.85 38 144.15 6 155 6" pathFrom="M -1 120L -1 120L 31 120L 62 120L 93 120L 124 120L 155 120"></path><g id="SvgjsG3911" class="apexcharts-series-markers-wrap" data:realIndex="0"><g class="apexcharts-series-markers"><circle id="SvgjsCircle3947" r="0" cx="0" cy="0" class="apexcharts-marker weq2blt95 no-pointer-events" stroke="#ffffff" fill="#ffab00" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle></g></g></g><g id="SvgjsG3912" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine3942" x1="0" y1="0" x2="155" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine3943" x1="0" y1="0" x2="155" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG3944" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG3945" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG3946" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect3905" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG3931" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG3903" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 40px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 171, 0);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                <div class="resize-triggers"><div class="expand-trigger"><div style="width: 301px; height: 117px;"></div></div><div class="contract-trigger"></div></div></div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 mb-4 col-sm-12 order-1">
        <!-- Striped Rows -->
        <div class="card">
            <div class="card-header p-3">
                <div class="col nopadding">
                <h5 class="nopadding text-primary">Jadwal Reservasi Tedekat</h5>
                </div>
            </div>
            <div class="card-body border-top">
                <div id="calendar" class="mt-3"></div>
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>
    </div>
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
                    <label class="col-sm-4">Ruang Lab</label>
                    <div class="col-sm-8">
                        <span id="name_lab"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4">Peminjam</label>
                    <div class="col-sm-8">
                        <span id="peminjam"></span>
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
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>
    <script src="<?= base_url('assets/js/dashboards-analytics.js'); ?>"></script>
    <?= script_tag('assets/vendor/libs/moment/moment.min.js'); ?>
    <?= script_tag('assets/vendor/libs/fullcalendar/fullcalendar.min.js'); ?>
    <?= script_tag('assets/vendor/js/calendar-event.js'); ?>
    <?php if(session()->has('error')): ?>
        <script type="text/javascript">
            var msg = "<?= session("error"); ?>";
            showToast('danger','Peringatan',msg,'#toast-alert');
        </script>
    <?php endif; ?>

    <?php if(session()->has('success')): ?>
        <script type="text/javascript">
            var msg = "<?= session("success"); ?>";
            showToast('success','Sukses',msg,'#toast-alert');
        </script>
    <?php endif; ?>
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
                    url: "<?= site_url('member/my-reservation/getschedule'); ?>",
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
                                $('#form-detail').find('span#name_lab').text(data.name_lab);
                                $('#form-detail').find('span#peminjam').text(peminjam);
                                $('#form-detail').find('span#range_time').text(range_time);
                                $('#form-detail').find('span#status').text(status);
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
