@extends('template.landing')

@section('header')
    <link rel="stylesheet" href="{{ asset('sweetalert2.min.css') }}">
@endsection

@section('content')
    <section class="sec1">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-12" data-aos="fade-left" data-aos-duration="1500">
                    <h2 class="card-title text-primary text-center">
                        Perolehan Suara Pemilihan Ketua dan Wakil Ketua HIMTIF Universitas Pamulang
                    </h2>
                </div>
            </div>
            <div class="row mt-3">
            <canvas id="myChart" width="400" height="150"></canvas>
                    <div class="card mt-3">
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
                                            <td>{{ $knd['no_paslon'] }}</td>
                                            <td>{{ $knd['total'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script src="{{ asset('landingpage') }}/chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# Hasil Suara',
                    maxBarThickness: 40,
                    data: {!! json_encode($totalSuara) !!},
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
    </script>
@endsection
