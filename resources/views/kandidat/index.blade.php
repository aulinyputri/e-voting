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
                        <h6 class="m-0 font-weight-bold text-primary">Data {{ ucfirst(request()->segment(2)) }}</h6>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <a href="/admin/kandidat/create" class="btn bg-gradient-primary text-white btn-sm ml-1">
                            <i class="fas fa-plus-square"></i> Tambah Data {{ ucfirst(request()->segment(2)) }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Nomor Paslon</th>
                                <th>Nama Kandidat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($kandidat as $item)
                                <tr>
                                    <td style="width: 10px">{{ $no++ }}</td>
                                    <td>{{ $item->nama_kandidat }}</td>
                                    <td>{{ $item->no_paslon }}</td>
                                    <td>
                                        <a href="{{ asset('foto/' . $item->foto) }}" target="_blank">
                                            <img src="{{ asset('foto/' . $item->foto) }}" width="50">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/admin/kandidat/{{ $item->kandidat_id }}/edit"
                                            class="btn bg-gradient-warning text-white btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="/admin/kandidat/{{ $item->kandidat_id }}/destroy"
                                            class="btn bg-gradient-danger text-white btn-sm"
                                            onclick="return confirm('Yakin mau dihapus?!')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
