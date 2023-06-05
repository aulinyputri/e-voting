@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ ucfirst(request()->segment(2)) }}</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                @if (session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md-4">
                                <h6 class="m-0 font-weight-bold text-primary">Ubah {{ ucfirst(request()->segment(2)) }}</h6>
                            </div>
                        </div>
                    </div>
                    {{-- {{ date('H:i:s') }} --}}
                    <div class="card-body">
                        <form action="/admin/waktu/update/{{ $waktu->id }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    value="{{ $waktu->tanggal_mulai }}" required>
                                @error('tanggal_mulai')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                        <label for="jam_akhir">Waktu Mulai</label>
                        <input type="text" name="jam_mulai" id="jam_mulai" class="form-control" placeholder="{{$waktu->jam_mulai}}"
                            value="{{ old('jam_mulai') }}" required>
                        @error('jam_akhir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="tanggal_akhir">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir"
                                    class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                    value="{{ $waktu->tanggal_akhir }}" required>
                                @error('tanggal_akhir')
                                    <span class="text-danger ml-3">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                        <label for="jam_akhir">Waktu Akhir</label>
                        <input type="text" name="jam_akhir" id="jam_akhir" class="form-control" placeholder="{{$waktu->jam_akhir}}"
                            value="{{ old('jam_akhir') }}" required>
                        @error('jam_akhir')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn bg-gradient-primary text-white mt-3">Update Waktu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
