<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('sweetalert2.min.css') }}">

    <title>Sweetalert</title>
</head>

<body>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($tes as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->first }}</td>
                    <td>{{ $item->last }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <button type="button" data-id="{{ $item->id }}" data-first="{{ $item->first }}"
                            id="hapus">Hapus</button>
                        <button type="button" data-id="{{ $item->id }}" data-first="{{ $item->first }}"
                            id="setuju">Setujui</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('sweetalert2.all.min.js') }}"></script>
    <script>
        $(document).on('click', '#setuju', function () {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let id = $(this).data('id');
            let first = $(this).data('first');
            Swal.fire({
                title: 'Kamu yakin akan meilih ' + first + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: "Tidak",
            }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/sweetalert/setuju',
                            type: 'post',
                            data: {
                                '_token': _token,
                                'id': id,
                            },
                            success: function (result) {
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

        $(document).on('click', '#hapus', function () {
            let id = $(this).data('id');
            let first = $(this).data('first');
            Swal.fire({
                title: 'Kamu yakin akan menghapus ' + first + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/sweetalert/hapus/' + id,
                        type: 'get',
                        success: function (result) {
                            if (result.success == true) {
                                Swal.fire({
                                    title: 'Berhasil terhapus!',
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
</body>

</html>