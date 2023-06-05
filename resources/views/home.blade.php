@extends('template.landing')

@section('content')
    <section class="sec1">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                        <strong><i class="fas fa-bullhorn"></i> Pengumuman!</strong> Pemilihan e-voting akan dimulai pada
                        tanggal {{ date('d M Y', strtotime($waktu->tanggal_mulai)) }} {{ $waktu->jam_mulai }} sampai dengan
                        tanggal {{ date('d M Y', strtotime($waktu->tanggal_akhir)) }} {{ $waktu->jam_akhir }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" data-aos="fade-left" data-aos-duration="1500">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            {{-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($poster as $key => $item)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('foto/' . $item->poster) }}" class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
