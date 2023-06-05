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
                <form action="/admin/poster/update/{{ $poster->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-md-2">
                        <img src="{{ asset('foto/'.$poster->foto) }}" class="img-thumbnail">
                    </div> --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="foto">Poster</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                                @error('foto')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div id="loadingUpdate"></div>
                    <button type="submit" class="btn bg-gradient-primary text-white mt-3">Update</button>
                    <a href="/admin/poster" class="btn bg-gradient-danger text-white mt-3">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
