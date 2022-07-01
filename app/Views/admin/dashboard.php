<?= $this->extend('admin/templates/main'); ?>

<?= $this->section('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="bs-toast toast toast-placement-ex top-0 start-50 m-3 sld-down"
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
    <div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
            <div class="card-body">
                <h5 class="card-title text-primary">Selamat datang <?= $adminProfile['full_name']; ?>! 🎉</h5>
                <p class="mb-4">
                Terdapat <span class="fw-bold"><?= $reservasiPending; ?></span> reservasi yang belum diverifikasi. 
                Silakan check daftar reservasi di halaman semua reservasi.
                </p>
                <a href="<?= site_url('admin/all-reservations'); ?>" class="btn btn-sm btn-outline-primary">Cek Reservasi</a>
            </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
                <img src="<?= base_url('assets/img/illustrations/man-with-laptop-light.png'); ?>"
                height="140">
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="<?= base_url('assets/img/icons/unicons/chart.png'); ?>" alt="Credit Card" class="rounded" />
                        </div>
                        </div>
                        <span class="d-block mb-1">Total Labroom</span>
                        <h3 class="card-title text-nowrap mb-2"><?= $total['labroom']; ?></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar flex-shrink-0">
                            <img src="<?= base_url('assets/img/icons/unicons/cc-primary.png'); ?>" alt="Credit Card" class="rounded" />
                        </div>                
                    </div>
                    <span class="fw-semibold d-block mb-1">Total Fasilitas</span>
                    <h3 class="card-title mb-2"><?= $total['fasilitas']; ?></h3>
                </div>
                </div>
            </div>
            </div>
        </div>
      <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
        <div class="row row-bordered g-0">
            <div class="col-md-8">
                <h5 class="card-header m-0 me-2 pb-3">Reservasi (civitas/non-civitas)</h5>
                <div id="series-chart" class="px-2"></div>
            </div>
            <div class="col-md-4">
                <h5 class="card-header m-0 me-2 pb-3">Kategori Labroom</h5>
                <div id="pie-chart"></div>
            </div>
        </div>
        </div>
    </div>
    <!--/ Total Revenue -->
     <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
        <div class="col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                    <img
                    src="<?= base_url('assets/img/icons/unicons/chart-success.png'); ?>"
                    alt="chart success"
                    class="rounded"
                    />
                </div>
                </div>
                <span class="fw-semibold d-block mb-1">Total Member</span>
                <h3 class="card-title mb-2"><?= $total['member']['all']; ?></h3>
                <small class="text-success fw-semibold">
                    (<?= $total['member']['activated']; ?> activated / 
                    <?= $total['member']['not_activated']; ?> not-activated)  </small>
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                        <img
                        src="<?= base_url('assets/img/icons/unicons/wallet-info.png'); ?>"
                        alt="Credit Card"
                        class="rounded"
                        />
                    </div>
                    </div>
                    <span>Total Reservasi</span>
                    <h3 class="card-title text-nowrap mb-2"><?= $total['reservasi']['all']; ?></h3>
                    <small class="text-success fw-semibold">
                        (<?= $total['reservasi']['civitas']; ?> civitas / 
                        <?= $total['reservasi']['non_civitas']; ?> non-civitas)
                    </small>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                    <div class="card-title">
                    <h5 class="text-nowrap mb-2">Total Keuntungan</h5>
                    <span class="badge bg-label-warning rounded-pill"><?= $keuntungan['year']; ?></span>
                    </div>
                    <div class="mt-sm-auto">
                    <h3 class="mb-0"><?= $keuntungan['total']; ?></h3>
                    </div>
                </div>
                <div id="profileReportChart"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">Semua Reservasi</h5>
                <div class="card-body" id="column-chart">
                </div>
            </div>
        </div>
        <div class="col-6">
        <div class="card">
                <h5 class="card-header">Reservasi Berbayar</h5>
                <div class="card-body" id="reversebar-chart"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content'); ?>

<?= $this->section('extrascript'); ?>
    <?= script_tag('assets/vendor/libs/apex-charts/apexcharts.js'); ?>
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
        var labroom = <?= $kategori; ?>;
        var keuntungan = <?= $keuntungan['data']; ?>;
        var reservasiPaided = <?= $orderReservasi; ?>;
        var reservasiAll = <?= $allReservasi; ?>;
        var reservasiKeunt = <?= $keuntunganReservasi; ?>;
        function showPieChart(){
            var options = {
                series: labroom.jumlah,
                labels: labroom.namelab,
                chart: {
                    height:400,
                    type: 'donut',
                },
                dataLabels: {
                    enabled: false
                },
                responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 400
                    },
                    legend: {
                        show: true
                    }
                }}],
                legend: {
                    position: 'bottom',
                    showForSingleSeries: false,
                    offsetX: 0,
                    offsetY: 0
                }};

            var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
            chart.render();
        }
        function showColumnChart(){
            var options = {
                series: [{
                name: 'Finished',
                    data: reservasiAll.finished
                }, {
                name: 'Verified',
                    data: reservasiAll.verified
                }, {
                name: 'Pending',
                    data: reservasiAll.pending
                },{
                name: 'Cancel',
                    data: reservasiAll.cancell
                }],
                chart: {
                type: 'bar',
                height: 350
                },
                plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
                },
                dataLabels: {
                enabled: false
                },
                stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
                },
                xaxis: {
                categories: reservasiAll.key
                },
                yaxis: {
                title: {
                    text: 'jml reservasi'
                }
                },
                fill: {
                opacity: 1
                },
                tooltip: {
                y: {
                    formatter: function (val) {
                    return val + " reservasi"
                    }
                }
                }
                };

                var chart = new ApexCharts(document.querySelector("#column-chart"), options);
                chart.render();
        }
        function showSeriesChart(){
            var options = {
                series: [{
                name: reservasiKeunt.key1,
                data: reservasiKeunt.val1
                }, {
                name: reservasiKeunt.key2,
                data: reservasiKeunt.val2
                }],
                chart: {
                height: 350,
                type: 'area'
                },
                dataLabels: {
                enabled: false
                },
                stroke: {
                curve: 'smooth'
                },
                xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                },
                tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
                },
                };

                var chart = new ApexCharts(document.querySelector("#series-chart"), options);
                chart.render();
        }
        function reverseBarChart(){
            var options = {
                series: [{
                    data: reservasiPaided.value
                }],
                chart: {
                type: 'bar',
                height: 350
                },
                annotations: {
                xaxis: [{
                    x: 500,
                    borderColor: '#00E396',
                    label: {
                    borderColor: '#00E396',
                    style: {
                        color: '#fff',
                        background: '#00E396',
                    },
                    }
                }],
                },
                plotOptions: {
                bar: {
                    horizontal: true,
                }
                },
                dataLabels: {
                enabled: true
                },
                xaxis: {
                    categories: reservasiPaided.key,
                },
                grid: {
                xaxis: {
                    lines: {
                    show: true
                    }
                }
                },
                yaxis: {
                reversed: true,
                axisTicks: {
                    show: true
                }
                }
                };

                var chart = new ApexCharts(document.querySelector("#reversebar-chart"), options);
                chart.render();
        }
        function seriesReport(){
            const profileReportChartEl = document.querySelector('#profileReportChart'),
                profileReportChartConfig = {
                chart: {
                    height: 80,
                    type: 'line',
                    toolbar: {
                    show: false
                    },
                    dropShadow: {
                    enabled: true,
                    top: 10,
                    left: 5,
                    blur: 3,
                    color: config.colors.warning,
                    opacity: 0.15
                    },
                    sparkline: {
                    enabled: true
                    }
                },
                grid: {
                    show: false,
                    padding: {
                    right: 8
                    }
                },
                colors: [config.colors.warning],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 5,
                    curve: 'smooth'
                },
                series: [
                    {
                    data: keuntungan
                    }
                ],
                xaxis: {
                    show: false,
                    lines: {
                    show: false
                    },
                    labels: {
                    show: false
                    },
                    axisBorder: {
                    show: false
                    }
                },
                yaxis: {
                    show: false
                }
            };
            const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
            profileReportChart.render();
        }
        showPieChart();
        showColumnChart();
        showSeriesChart();
        reverseBarChart();
        seriesReport();
    </script>
<?= $this->endSection('extrascript'); ?>
