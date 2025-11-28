@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Tambah Material</h4>

    <form action="{{ route('material.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label class="form-label">Nama Material</label>
            <input type="text" name="name" class="form-control" autofocus required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('material.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
