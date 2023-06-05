@extends('template.layout')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Calon Pemilih</h1>
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
                        <strong>{{ session('error') }}</strong>
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Calon Pemilih</h6>
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        <button type="button" class="btn bg-gradient-primary text-white btn-sm ml-1" data-toggle="modal"
                            data-target="#modalTambah">
                            <i class="fas fa-plus-square"></i> Tambah Data Calon Pemilih
                        </button>
                        <button type="button" class="btn bg-gradient-primary text-white btn-sm ml-1" data-toggle="modal"
                            data-target="#modalImport">
                            <i class="fas fa-file-excel"></i> Import Data Calon Pemilih
                        </button>
                        <a href="/admin/database/export" class="btn bg-gradient-primary text-white btn-sm ml-1"
                            target="_blank">
                            <i class="fas fa-file-excel"></i> Export Data Calon Pemilih
                        </a>
                        @php
                            $angka_mulai = strtotime($waktu->tanggal_mulai . ' ' . $waktu->jam_mulai);
                            $angka_akhir = strtotime($waktu->tanggal_akhir . ' ' . $waktu->jam_akhir);
                            
                            $acuan = strtotime(date('Y-m-d H:i'));
                            
                        @endphp
                        @if ($acuan >= $angka_mulai && $acuan <= $angka_akhir)                            
                        @else
                        <a href="/admin/database/truncate" class="btn bg-gradient-primary text-white btn-sm ml-1"
                            onclick="return confirm('Yakin mau dibersihkan?!')">
                            <i class="fas fa-trash-alt"></i> Bersihkan Data Calon Pemilih
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($database as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>
                                        <button type="button" class="btn bg-gradient-warning text-white btn-sm"
                                            id="btnEdit" data-id="{{ $item->user_id }}" data-nim="{{ $item->nim }}"
                                            data-nama="{{ $item->name }}" data-email="{{ $item->email }}"
                                            data-phone_number="{{ $item->phone_number }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        @php
                                            $angka_mulai = strtotime($waktu->tanggal_mulai . ' ' . $waktu->jam_mulai);
                                            $angka_akhir = strtotime($waktu->tanggal_akhir . ' ' . $waktu->jam_akhir);
                                            
                                            $acuan = strtotime(date('Y-m-d H:i'));
                                            
                                        @endphp
                                        @if ($acuan >= $angka_mulai && $acuan <= $angka_akhir)                            
                                        @else
                                        <a href="/admin/database/{{ $item->user_id }}/destroy"
                                            class="btn bg-gradient-danger text-white btn-sm"
                                            onclick="return confirm('Yakin mau dihapus?!')">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </a>
                                        @endif                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTambahLabel">Modal Tambah Data {{ ucfirst(request()->segment(2)) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/database" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" id="nim" class="form-control" required
                                value="{{ old('nim') }}">
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required
                                value="{{ old('nama') }}">
                            @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">No HP</label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" required
                                value="{{ old('phone_number') }}">
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary text-white"
                        data-dismiss="modal">Tutup</button>
                    <div id="loadingSimpan"></div>
                    <button type="submit" id="btnSimpan" class="btn bg-gradient-primary text-white">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Modal Edit Data {{ ucfirst(request()->segment(2)) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formEdit">
                        @csrf
                        <div class="form-group">
                            <label for="nim1">NIM</label>
                            <input type="text" name="nim1" id="nim1" class="form-control" required>
                            @error('nim1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama1">Nama</label>
                            <input type="text" name="nama1" id="nama1" class="form-control" required>
                            @error('nama1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email1">Email</label>
                            <input type="email" name="email1" id="email1" class="form-control" required>
                            @error('email1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number1">No HP</label>
                            <input type="text" name="phone_number1" id="phone_number1" class="form-control" required>
                            @error('phone_number1')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary text-white"
                        data-dismiss="modal">Tutup</button>
                    <div id="loadingUpdate"></div>
                    <button type="submit" id="btnUpdate" class="btn bg-gradient-primary text-white">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImportLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalImportLabel">Modal Import Data {{ ucfirst(request()->segment(2)) }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/database/import" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" id="file" class="form-control" required>
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary text-white"
                        data-dismiss="modal">Tutup</button>
                    <div id="loadingImport"></div>
                    <button type="submit" id="btnImport" class="btn bg-gradient-primary text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @error('file')
        <script>
            $(document).ready(function() {
                $('#modalImport').modal('show');
            })
        </script>
    @enderror

    @if ($errors->has('nim') || $errors->has('nama'))
        <script>
            $(document).ready(function() {
                $('#modalTambah').modal('show');
            })
        </script>
    @endif

    @if ($errors->has('nim1') || $errors->has('nama1'))
        <script>
            $(document).ready(function() {
                $('#modalEdit').modal('show');
            })
        </script>
    @endif

    <script>
        $(document).on('click', '#btnSimpan', function() {
            let nim = $('#nim').val();
            let nama = $('#nama').val();
            let email = $('#email').val();
            let phone_number = $('#phone_number').val();

            if (nim == '') {
                $('#nim').focus();
                $('#nim').addClass('is-invalid');
            } else if (nama == '') {
                $('#nama').focus();
                $('#nama').addClass('is-invalid');
            } else if (email == '') {
                $('#email').focus();
                $('#email').addClass('is-invalid');
            } else if (phone_number == '') {
                $('#phone_number').focus();
                $('#phone_number').addClass('is-invalid');
            } else {
                $('#btnSimpan').addClass('d-none');
                $('#loadingSimpan').html(`
            <button class="btn bg-gradient-primary text-white" type="button" disabled>
                <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
                Loading...
            </button>
            `);
            }
        });

        $(document).on('click', '#btnUpdate', function() {
            let nim = $('#nim1').val();
            let nama = $('#nama1').val();
            let email = $('#email1').val();
            let phone_number = $('#phone_number1').val();

            if (nim == '') {
                $('#nim1').focus();
                $('#nim1').addClass('is-invalid');
            } else if (nama == '') {
                $('#nama1').focus();
                $('#nama1').addClass('is-invalid');
            } else if (email == '') {
                $('#email1').focus();
                $('#email1').addClass('is-invalid');
            } else if (phone_number == '') {
                $('#phone_number1').focus();
                $('#phone_number1').addClass('is-invalid');
            } else {
                $('#btnUpdate').addClass('d-none');
                $('#loadingUpdate').html(`
            <button class="btn bg-gradient-primary text-white" type="button" disabled>
                <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
                Loading...
            </button>
            `);
            }
        });

        $(document).on('click', '#btnImport', function() {
            let file = $('#file').val();

            if (file == '') {
                $('#file').focus();
                $('#file').addClass('is-invalid');
            } else {
                $('#btnImport').addClass('d-none');
                $('#loadingImport').html(`
            <button class="btn bg-gradient-primary text-white" type="button" disabled>
                <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
                Loading...
            </button>
            `);
            }
        });

        $(document).on('click', '#btnEdit', function() {
            let id = $(this).data('id');
            let nim = $(this).data('nim');
            let nama = $(this).data('nama');
            let email = $(this).data('email');
            let phone_number = $(this).data('phone_number');

            $('#formEdit').attr('action', '/admin/database/' + id + '/update');
            $('#nim1').val(nim);
            $('#nama1').val(nama);
            $('#email1').val(email);
            $('#phone_number1').val(phone_number);
            $('#modalEdit').modal('show');
        })
    </script>
@endsection
