@extends('template.landing_verifikasi')

@section('content')
    <section class="sec1">
        <div class="container">
            <div class="row sec1-mt justify-content-center">
                <div class="col-md-6 sec1-col-1 mt-5" data-aos="fade-right" data-aos-duration="1500">
                    <h1 class="text-primary">Buat Password</h1>
                    <p class="text-muted">Silahkan buat password anda:</p>
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <div class="btn-login">
                        <form action="/verifikasi/inputdata" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="nim" value="{{ $nim }}">
                                <label for="password" class="form-label text-secondary label-register">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation"
                                    class="form-label text-secondary label-register">Konfirmasi
                                    Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" required>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary bg-gradient">Simpan Data</button>
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
