@extends('template.landing_verifikasi')

@section('content')
    <section class="sec1">
        <div class="container">
            <div class="row sec1-mt justify-content-center">
                <div class="col-md-6 sec1-col-1 mt-5" data-aos="fade-right" data-aos-duration="1500">
                    <h1 class="text-primary">Akun terverifikasi</h1>
                    <p class="text-muted">Silahkan masukan kode unik Anda yang sudah kami kirim lewat email</p>
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="btn-login">
                        <form action="/verifikasi/email" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-secondary label-register">Email</label>
                                <input type="hidden" name="nim" class="form-control" value="{{ $nim }}"
                                    readonly>
                                <input type="text" name="email" class="form-control" value="{{ $email }}"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kodeunik" class="form-label text-secondary label-register">Kode Unik</label>
                                <input type="text" name="kodeunik"
                                    class="form-control @error('kodeunik') is-invalid @enderror" id="kodeunik"
                                    value="{{ old('kodeunik') }}" required>
                                @error('kodeunik')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary bg-gradient">Kirim</button>
                            </div>
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
