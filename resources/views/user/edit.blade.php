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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data {{ ucfirst(request()->segment(2)) }}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/kandidat/update/{{ $kandidat->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_kandidat">Nama Kandidat</label>
                    <input type="text" name="nama_kandidat" id="nama_kandidat"
                        class="form-control @error('nama_kandidat') is-invalid @enderror"
                        value="{{ old('nama_kandidat') == '' ? $kandidat->nama_kandidat :  old('nama_kandidat') }}"
                        required>
                    @error('nama_kandidat')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_calon">Nama Calon</label>
                    <input type="text" name="nama_calon" id="nama_calon" class="form-control"
                        value="{{ old('nama_calon') == '' ? $kandidat->nama_calon :  old('nama_calon') }}" required>
                    @error('nama_calon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('foto/'.$kandidat->foto) }}" class="img-thumbnail">
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Update Photo</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            @error('foto')
                            <span class="text-danger ml-3">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn bg-gradient-primary text-white mt-3">Update</button>
                <a href="/admin/kandidat" class="btn bg-gradient-danger text-white mt-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection