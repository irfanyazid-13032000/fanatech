@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<style>
    #myChartContainer {
        width: 900px;
        margin: 0 auto;
    }

    #myChart {
        height: 500px;
    }

    .custom-card {
        background-color: white;
        padding: 10px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .custom-card h1 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .custom-card p {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .custom-card i {
        font-size: 24px;
        margin-bottom: 10px;
    }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />




<div class="card-group">
    <div class="card custom-card">
        <i class="fas fa-check-circle"></i> <!-- Ikon centang -->
        <h1>Terkonfirmasi</h1>
        <p>{{6}}</p>
    </div>

    <div class="card custom-card">
    <i class="fas fa-times-circle"></i> <!-- Ikon silang -->
        <h1>Tertolak</h1>
        <p>{{9}}</p>
    </div>

    <div class="card custom-card">
    <i class="fas fa-file-alt"></i> <!-- Ikon document -->
        <h1>Jumlah Asesi</h1>
        <p>{{ 10 }}</p>
    </div>
</div>

<!-- <div class="card mb-4">
    <div id="myChartContainer">
        <canvas id="myChart"></canvas>
    </div>
</div> -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>



<div class="card">
        <h6 class="text-center mt-2">Rekapitulasi </h6>
        <div class="chart-container">
        <canvas id="jenjang_pendidikan"></canvas>
      </div>
    </div>


      <script>
       

        const jenjang_pendidikan = document.getElementById('jenjang_pendidikan');
        new Chart(jenjang_pendidikan, {
          type: 'doughnut',
          data: {
            labels: ['Tertolak','Terkonfirmasi','Jumlah Asesi'],
            datasets: [{
              label: '%',
              data: [{{ 4 }}, {{ 9 }},{{ 7 }}],
              backgroundColor: ['black','orange','blue'],

            }],
            hoverOffset: 4
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            borderWidth:1,
            xpadding: 15,
            ypadding: 15,
            
            }
        });
      </script>





@endsection
