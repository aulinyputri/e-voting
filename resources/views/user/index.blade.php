@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pemilih</h1>
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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Peringatan!</strong> {{ session('error') }}
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Pemilih</h6>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <a href="/admin/user/export" class="btn bg-gradient-primary text-white btn-sm ml-1" target="_blank">
                            <i class="fas fa-file-excel"></i> Export Data Pemilih
                        </a>
                        @php
                            $angka_mulai = strtotime($waktu->tanggal_mulai . ' ' . $waktu->jam_mulai);
                            $angka_akhir = strtotime($waktu->tanggal_akhir . ' ' . $waktu->jam_akhir);
                            
                            $acuan = strtotime(date('Y-m-d H:i'));
                            
                        @endphp
                        @if ($acuan >= $angka_mulai && $acuan <= $angka_akhir)
                            ''
                        @else
                            <a href="/admin/user/truncate" class="btn bg-gradient-primary text-white btn-sm ml-1"
                                onclick="return confirm('Yakin mau dibersihkan?!')">
                                <i class="fas fa-trash-alt"></i> Bersihkan Data Pemilih
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="bg-gradient-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Waktu Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $item)
                                <tr>
                                    <td style="width: 10px">{{ $no++ }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="/admin/user/{{ $item->user_id }}/destroy"
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
