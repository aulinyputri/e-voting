@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ ucfirst(request()->segment(2)) }}</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> {{ session('sukses') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="m-0 font-weight-bold text-primary">Ubah {{ ucfirst(request()->segment(2)) }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/admin/profile/update/{{ auth()->user()->user_id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ auth()->user()->name }}" required>
                                @error('name')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ auth()->user()->email }}" required>
                                @error('email')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_number">No HP</label>
                                <input type="text" name="phone_number" id="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{ auth()->user()->phone_number }}" required>
                                @error('phone_number')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Level</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->role }}" readonly>
                            </div>
                            <button type="submit" class="btn bg-gradient-primary text-white mt-3">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/admin/profile/updatepassword/{{ auth()->user()->user_id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="password">Ganti Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn bg-gradient-primary text-white mt-3">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
