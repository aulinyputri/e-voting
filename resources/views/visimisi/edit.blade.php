@extends('template.layout')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ ucfirst(request()->segment(2)) }}</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Perhatian!</strong> {{ session('warning') }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data {{ ucfirst(request()->segment(2)) }}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="/admin/visimisi/update/{{ $visiMisi->id }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kandidat_id">Kandidat</label>
                    <input type="hidden" name="id" value="{{ $visiMisi->id }}">
                    <select name="kandidat_id" id="kandidat_id" class="form-control">
                        @foreach ($kandidat as $item)
                        <option value="{{ $item->kandidat_id }}" {{ $visiMisi->kandidat_id == $item->kandidat_id ? 'selected' : '' }}>
                            {{ $item->nama_kandidat . ' - '  . $item->nama_calon}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="visi">Visi </label>
                    <textarea name="visi" id="visi" class="ckeditor form-control"
                        required>{{ $visiMisi->visi }}</textarea>
                    @error('visi') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="misi">Misi </label>
                    <textarea name="misi" id="misi" class="ckeditor form-control"
                        required>{{ $visiMisi->misi }}</textarea>
                    @error('misi') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" id="btnUpdate" class="btn bg-gradient-primary text-white mt-3">Update</button>
                <a href="/admin/visimisi" class="btn bg-gradient-danger text-white mt-3">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection