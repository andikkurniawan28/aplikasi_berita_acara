@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Edit Jenis Kendaraan</h4>

    <form action="{{ route('jenis_kendaraan.update', $jenis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="form-label">Nama Jenis Kendaraan</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $jenis->name }}" required>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('jenis_kendaraan.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
