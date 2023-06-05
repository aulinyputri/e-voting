@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ ucfirst(request()->segment(2)) }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL CALON PEMILIH</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span id="database">

                                    </span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Kandidat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span id="kandidat"></span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-id-card fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Terverfikasi
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <span id="user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Suara</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <div id="suara"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bell fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Perolehan Suara Pemilihan Ketua dan Wakil Ketua HIMTIF Universitas Pamulang
                        </h6>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Total Suara Masuk</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Calon</th>
                                    <th>Total Suara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kandidat as $knd)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $knd['nama_calon'] }}</td>
                                        <td>{{ $knd['total'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script>
        setInterval(function() {
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/kelas',
                success: function(result) {
                    $('#database').html(result.kelas);
                }
            })
        }, 1000);

        setInterval(function() {
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/kandidat',
                success: function(result) {
                    $('#kandidat').html(result.kandidat);
                }
            })
        }, 1000);

        setInterval(function() {
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/user',
                success: function(result) {
                    $('#user').html(result.user);
                }
            })
        }, 1000);

        setInterval(function() {
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/user',
                success: function(result) {
                    $('#user').html(result.user);
                }
            })
        }, 1000);

        setInterval(function() {
            $.ajax({
                type: 'get',
                url: '/admin/dashboard/suara',
                success: function(result) {
                    $('#suara').html(result.suara);
                }
            })
        }, 1000);
    </script>
@endsection

@section('footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"
        integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [],
                // labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Hasil Suara',
                    maxBarThickness: 40,
                    data: [],
                    // data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgb(78, 115, 223)',
                        'rgb(78, 115, 223)',
                        'rgb(78, 115, 223)',
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        setInterval(function() {
            $.ajax({
                url: '/admin/dashboard/chart',
                type: 'get',
                success: function(result) {
                    console.log(result);
                    myChart.data.labels = result.labels;
                    myChart.data.datasets[0].data = result.data;
                    myChart.update();
                }
            });
        }, 1000);
    </script>
@endsection
