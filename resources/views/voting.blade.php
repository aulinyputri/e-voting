@extends('template.landing')

@section('header')
    <link rel="stylesheet" href="{{ asset('sweetalert2.min.css') }}">
@endsection

@section('content')
    <section class="sec1">
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-md-12" data-aos="fade-left" data-aos-duration="1500">
                    <h2 class="card-title text-primary text-center">
                        Kandidat Calon Ketua dan Wakil Ketua HIMTIF Universitas Pamulang
                    </h2>
                </div>
            </div>

            <div class="row">
                @foreach ($visimisi as $item)
                    <div class="col-md-4 mt-3">
                        <div class="card shadow card-responsive" data-aos="fade-left" data-aos-duration="1500">
                            <img src="{{ asset('foto/' . $item->kandidat->foto) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $item->kandidat->nama_kandidat }}</h5>
                                <h6 class="card-subtitle text-center mb-2 text-muted">{{ $item->kandidat->nama_calon }}</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <div class="d-grid gap-2">
                                            <button type="button" class="btn btn-primary bg-gradient" id="btnVisiMisi"
                                                data-bs-toggle="modal" data-bs-target="#modalVisiMisi"
                                                data-id="{{ $item->id }}" data-visi="{{ $item->visi }}"
                                                data-misi="{{ $item->misi }}"
                                                data-nama_kandidat="{{ $item->kandidat->nama_kandidat }}"
                                                data-nama_calon="{{ $item->kandidat->nama_calon }}"
                                                data-foto="{{ asset('foto/' . $item->kandidat->foto) }}">Visi &
                                                Misi</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @php
                                            $angka_mulai = strtotime($waktu->tanggal_mulai . ' ' . $waktu->jam_mulai);
                                            $angka_akhir = strtotime($waktu->tanggal_akhir . ' ' . $waktu->jam_akhir);
                                            
                                            $acuan = strtotime(date('Y-m-d H:i'));
                                            
                                            // if ($acuan >= $angka_mulai && $acuan <= $angka_akhir) {
                                            //     echo 'Mulai';
                                            // } else {
                                            //     echo 'Tutup';
                                            // }
                                            
                                        @endphp
                                        <div class="d-grid gap-2">
                                            @if ($acuan >= $angka_mulai && $acuan <= $angka_akhir)
                                                @if ($user->status == 0)
                                                    <button type="button" class="btn btn-success bg-gradient"
                                                        id="btnVoting" data-id-kandidat="{{ $item->kandidat->kandidat_id }}"
                                                        data-nama-kandidat="{{ $item->kandidat->nama_kandidat }}">Voting</button>
                                                @else
                                                    <button type="button" class="btn btn-success bg-gradient"
                                                        disabled>Voting</button>
                                                @endif
                                            @else
                                                <button type="button" class="btn btn-success bg-gradient"
                                                    disabled>Voting</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <div class="modal fade" id="modalVisiMisi" tabindex="-1" aria-labelledby="modalVisiMisiLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="modalVisiMisiLabel">Visi Misi <span id="namaKandidat"></span> - <span
                            id="namaCalon"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('foto/1622626377_c2.png') }}" id="imgKandidat"
                                class="rounded-circle img-fluid">
                        </div>
                        <div class="col-md-9">
                            <h3>Visi</h3>
                            <div id="visi"></div>
                            <h3>Visi</h3>
                            <div id="misi"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).on('click', '#btnVisiMisi', function() {
            let id = $(this).data('id');
            let visi = $(this).data('visi');
            let misi = $(this).data('misi');
            let nama_kandidat = $(this).data('nama_kandidat');
            let nama_calon = $(this).data('nama_calon');
            let foto_kandidat = $(this).data('foto');

            $('#namaKandidat').html(nama_kandidat);
            $('#namaCalon').html(nama_calon);
            $('#imgKandidat').attr('src', foto_kandidat);
            $('#visi').html(visi);
            $('#misi').html(misi);
        });
    </script>
@endsection

@section('footer')
    <script src="{{ asset('sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).on('click', '#btnVoting', function() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let id_kandidat = $(this).data('id-kandidat');
            let nama_kandidat = $(this).data('nama-kandidat');
            Swal.fire({
                title: 'Kamu yakin akan memilih ' + nama_kandidat + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/voting',
                        type: 'post',
                        data: {
                            '_token': _token,
                            'id_kandidat': id_kandidat,
                        },
                        success: function(result) {
                            if (result.success == true) {
                                Swal.fire({
                                    title: 'Terima Kasih Sudah Berpartisipasi!',
                                    icon: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'Ok'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                })
                            }
                        }
                    });
                }
            })
        })
    </script>
@endsection
