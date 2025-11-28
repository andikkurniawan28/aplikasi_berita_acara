@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Tambah Jenis Kendaraan</h4>

    <form action="{{ route('jenis_kendaraan.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label class="form-label">Nama Jenis Kendaraan</label>
            <input type="text" name="name" class="form-control" autofocus required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('jenis_kendaraan.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
