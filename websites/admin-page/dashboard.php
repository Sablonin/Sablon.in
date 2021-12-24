<?php include 'components/top-link.php'; ?>
<?php require 'process/session-login.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>


<!-- Start Content Wrapper -->
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                <div class="card-body">
                    <h6 class="font-weight-normal">Jumlah Barang</h6>
                    <h2 class="mb-0"><?php
                                        include 'process/data-table.php';
                                        JumlahBarang();
                                        ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                <div class="card-body">
                    <h6 class="font-weight-normal">Jumlah Kategori</h6>
                    <h2 class="mb-0"><?php JumlahKategori() ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                <div class="card-body">
                    <h6 class="font-weight-normal">Jumlah Ulasan</h6>
                    <h2 class="mb-0"><?php JumlahUlasan() ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
            <div class="card bg-gradient-info text-white text-center card-shadow-info">
                <div class="card-body">
                    <h6 class="font-weight-normal">Jumlah Riwayat</h6>
                    <h2 class="mb-0"><?php JumlahRiwayat() ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Barang & Kategori</h4>
                    <div class="w-50 mx-auto mt-5">
                        <canvas id="traffic-chart" width="100" height="100"></canvas>
                    </div>
                    <div class="text-center mt-5">
                        <h4 class="mb-2">Alat & Bahan</h5>
                            <p class="card-description mb-5">Perbandingan antara jumlah barang dan jumlah kategori pada data pada sistem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Aktivitas Barang</h6>
                    </div>
                    <ul class="bullet-line-list">
                        <?php BarangActivity() ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Aktivitas Ulasan</h6>
                    </div>
                    <?php UlasanActivity() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content Wrapper -->

<?php include 'components/footer.php'; ?>
<?php include 'components/bottom-link.php'; ?>
<script>
    var canvas = document.getElementById('traffic-chart');
    var ctx = canvas.getContext('2d');
    var ctx = document.getElementById('traffic-chart').getContext("2d");
    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
    gradientStrokeBlue.addColorStop(0, '#6486fc');
    gradientStrokeBlue.addColorStop(1, '#0e4cfb');
    var gradientLegendBlue = 'linear-gradient(145deg, #6486fc, #0e4cfb)';

    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 150);
    gradientStrokeRed.addColorStop(0, 'rgba(238, 143, 154, 1)');
    gradientStrokeRed.addColorStop(1, 'rgba(233, 79, 133, 1)');
    var gradientLegendRed = 'linear-gradient(to right, rgba(238, 143, 154, 1), rgba(233, 79, 133, 1))';

    var trafficChartData = {
        datasets: [{
            data: [<?php JumlahBarang() ?>, <?php JumlahKategori() ?>],
            backgroundColor: [
                gradientStrokeBlue,
                gradientStrokeRed
            ],
            hoverBackgroundColor: [
                gradientStrokeBlue,
                gradientStrokeRed
            ],
            borderColor: [
                gradientStrokeBlue,
                gradientStrokeRed
            ],
            legendColor: [
                gradientLegendBlue,
                gradientLegendRed
            ]
        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Barang',
            'Kategori',
        ]
    };
    var trafficChartOptions = {
        responsive: true,
        animation: {
            animateScale: true,
            animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
            var text = [];
            text.push('<ul>');
            for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) {
                text.push('<li><h2 class="mb-3">' + trafficChartData.datasets[0].data[i] + '%</h2><div class="legend-content"><span class="legend-dots" style="background:' +
                    trafficChartData.datasets[0].legendColor[i] +
                    '"></span>' + trafficChartData.labels[i] + '</div>');
                text.push('</li>');
            }
            text.push('</ul>');
            return text.join('');
        },
        cutoutPercentage: 86
    };
    var trafficChartPlugins = {
        beforeDraw: function(chart) {
            var width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;

            ctx.restore();
            var fontSize = 1.2;
            ctx.font = fontSize + "em sans-serif";
            ctx.textBaseline = "middle";
            ctx.fillStyle = "#76838f";

            var text = "Data",
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;

            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    }
    var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
    var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions,
        plugins: trafficChartPlugins
    });
    $("#traffic-chart-legend").html(trafficChart.generateLegend());
</script>