@extends('template.landing')

@section('content')
    <section class="sec1">
        <div class="container">
            <div class="row sec1-mt">
                <div class="col-md-6 sec1-col-1 mt-5" data-aos="fade-right" data-aos-duration="1500">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>{{ session('error') }},</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <h1 class="text-primary">Selamat Datang di E-Voting HIMTIF</h1>
                    <p class="text-muted">Silahkan gunakan hak suara kalian untuk <br> menentukan ketua dan wakil HIMTIF
                        yang baru</p>
                    <div class="btn-login">
                        <a href="/verifikasi" class="btn btn-primary bg-gradient">Verifikasi NIM</a>
                        <a href="#registrasi" class="btn btn-success bg-gradient">Buat akun?</a>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-left" data-aos-duration="1500">
                    <img src="{{ asset('assets/img/hero1.png') }}" class="img-fluid sec1-img">
                </div>
            </div>
        </div>
    </section>

    <section class="sec1" id="registrasi">
        <div class="container">
            <div class="row sec1-mt">
                <div class="col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <img src="{{ asset('assets/img/hero2.png') }}" class="img-fluid sec1-img">
                </div>
                <div class="col-md-6 sec1-col-1" data-aos="fade-up" data-aos-duration="1500">
                    <h3 class="text-primary">Belum punya akun?</h3>
                    <p class="text-muted">Silahkan daftarkan dulu diri anda di form dibawah ini, jika sudah silahkan
                        login lalu pilih menu voting.</p>
                    <form action="/registrasiuser" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label text-secondary label-register">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Masukan nama anda..." value="{{ old('nama') }}" required>
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary label-register">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="Masukan email anda..." value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-secondary label-register">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Masukan password anda..." required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label text-secondary label-register">Konfirmasi
                                Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" placeholder="Konfirmasi password anda..." required>
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label text-secondary label-register">Kelas</label>
                            <select class="form-select" name="kelas" id="kelas" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary bg-gradient">Registrasi Akun</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
