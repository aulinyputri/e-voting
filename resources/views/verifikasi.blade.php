@extends('template.landing_verifikasi')

@section('content')
    <section class="sec1">
        <div class="container">
            <div class="row sec1-mt justify-content-center">
                <div class="col-md-6 sec1-col-1 mt-5" data-aos="fade-right" data-aos-duration="1500">
                    <h1 class="text-primary">Verifikasi</h1>
                    <p class="text-muted">Silahkan ketik NIM dan nama lengkap yang akan diverifikasi:</p>
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="btn-login">
                        <form action="/verifikasi" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                    id="nim" placeholder="Masukan NIM..." value="{{ old('nim') }}" required>
                                @error('nim')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Masukan Nama..." value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <a href="/" class="btn btn-primary bg-gradient text-center">Kembali ke Halaman Awal</a>
                            <button type="submit" class="btn btn-success bg-gradient">Verifikasi</button>
                        </form>
                        {{-- <div class="text-danger">
                            Perhatian! Pastikan NIM yang anda masukan benar!
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
