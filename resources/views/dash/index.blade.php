@extends('dashboard')
@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
      <div class="card h-lg-100 overflow-hidden">
        <div class="card-header bg-light">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="mb-0">Statistik Dashboard</h6>
            </div>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:40vh;margin-left:20px;">
                <option value="">Jenis Insentif</option>
                <?php
                $currtahun = date("Y");
                $fromtahun = date("Y") - 10;
                for ($tahun = $currtahun; $tahun >= $fromtahun; $tahun--) {
                    $selected = (isset($gettahun) && $gettahun == $tahun) ? 'selected' : '';
                    echo "<option value=$tahun $selected>$tahun</option>";
                }
                ?>
            </select>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:20vh">
                <option selected="true" disabled="disabled" value="">Tahun</option>
                <?php
                $currtahun = date("Y");
                $fromtahun = date("Y") - 10;
                for ($tahun = $currtahun; $tahun >= $fromtahun; $tahun--) {
                    $selected = (isset($gettahun) && $gettahun == $tahun) ? 'selected' : '';
                    echo "<option value=$tahun $selected>$tahun</option>";
                }
                ?>
            </select>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" style="display: inline-block;width:20vh">
                <option value="">Negeri</option>
                <?php
                $currtahun = date("Y");
                $fromtahun = date("Y") - 10;
                for ($tahun = $currtahun; $tahun >= $fromtahun; $tahun--) {
                    $selected = (isset($gettahun) && $gettahun == $tahun) ? 'selected' : '';
                    echo "<option value=$tahun $selected>$tahun</option>";
                }
                ?>
            </select>
          </div>
        </div>
      </div>
    </div>
</div>
            <div>
                <div class="row g-0">
                    <div class="col-lg-12 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <canvas id="canvas" height="400" style="padding:15px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <canvas id="canvas2" height="450" width="600" style="padding:15px;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="table-responsive scrollbar">
                                <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                                    <thead class="bg-light">
                                        <tr class="text-900 align-middle" style="text-align: center;">
                                            <th>Jantina</th>
                                            <th>Bilangan</th>
                                            <th>Peratusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle" style="text-align: center;">
                                            <td>Lelaki</td>
                                            <td>8</td>
                                            <td>80%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-12 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <canvas id="canvas3" height="400" style="padding:15px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <canvas id="canvas4" height="450" width="600" style="padding:15px;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="table-responsive scrollbar">
                                <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                                    <thead class="bg-light">
                                        <tr class="text-900 align-middle" style="text-align: center;">
                                            <th>Status Pekebun</th>
                                            <th>Bilangan</th>
                                            <th>Peratusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle" style="text-align: center;">
                                            <td>Lelaki</td>
                                            <td>8</td>
                                            <td>80%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <canvas id="canvas5" height="450" width="600" style="padding:15px;"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="table-responsive scrollbar">
                                <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                                    <thead class="bg-light">
                                        <tr class="text-900 align-middle" style="text-align: center;">
                                            <th>Kategori Usahawan</th>
                                            <th>Bilangan</th>
                                            <th>Peratusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle" style="text-align: center;">
                                            <td>Lelaki</td>
                                            <td>8</td>
                                            <td>80%</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-12 pe-lg-2 mb-3">
                        <div class="card h-lg-100 overflow-hidden">
                        <canvas id="canvas6" height="280" style="padding:15px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('script')
<script>
    
    window.onload = function() {
        createchart();
    }

    function createchart(){
        var daerah = <?php echo $daerah; ?>;
        var insentif = <?php echo $insentif; ?>;
        var jumdaerah = [];
        var juminsen = [];

        var jantina = <?php echo $jantina; ?>;
        var numjantina = <?php echo $jantinanum; ?>;
        var jumjantina = [];
        var jumnumjantina = [];

        for (var key in daerah) {
            if (Object.prototype.hasOwnProperty.call(daerah, key)) {
                jumdaerah.push(daerah[key]);
            }
        }
        for (var key in insentif) {
            if (Object.prototype.hasOwnProperty.call(insentif, key)) {
                juminsen.push(insentif[key]);
            }
        }

        for (var key in jantina) {
            if (Object.prototype.hasOwnProperty.call(jantina, key)) {
                if(jantina[key] == 1){
                    jumjantina.push("Lelaki");
                }
                if(jantina[key] == 2){
                    jumjantina.push("Perempuan");
                }
            }
        }
        for (var key in numjantina) {
            if (Object.prototype.hasOwnProperty.call(numjantina, key)) {
                jumnumjantina.push(numjantina[key]);
            }
        }

        var datas = [
            {
                label: 'Count',
                backgroundColor: "pink",
                data: juminsen
            }
        ];

        var barChartData = {
            labels: jumdaerah,
            datasets: datas
        };

        var datas2 = [
            {
                label: 'Count',
                backgroundColor: "pink",
                data: jumnumjantina
            }
        ];

        var barChartData2 = {
            labels: jumjantina,
            datasets: datas2
        };

        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Daerah'
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0
                        }
                    }]
                },
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function(tooltipItems, data) { 
                            const sum = juminsen.reduce((partial_sum, a) => partial_sum + a, 0);
                            var multistringText = [tooltipItems.yLabel];
                            var val = (tooltipItems.yLabel/sum *100).toFixed(2);
                            val = "" + val + "%";
                            multistringText.push(val);
                            return multistringText;
                        }
                    }
                },
                legend: {
                    display: false
                }
            }
        });
        var ctx = document.getElementById("canvas2").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'pie',
            data: barChartData2,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Jantina Bilangan'
                }
            }
        });
        var ctx = document.getElementById("canvas3").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Jenis Perniagaan'
                }
            }
        });
        var ctx = document.getElementById("canvas4").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'pie',
            data: barChartData2,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Status Pekebun Kecil'
                }
            }
        });
        var ctx = document.getElementById("canvas5").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'pie',
            data: barChartData2,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Kategori Usahawan'
                }
            }
        });
        var ctx = document.getElementById("canvas6").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'horizontalBar',
            data: barChartData,
            options: {
                indexAxis: 'y',
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Mengikut Umur'
                }
            }
        });
    };
</script>
@endsection