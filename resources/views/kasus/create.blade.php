@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Tambah Kasus</h4>

    <form action="{{ route('kasuss.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label class="form-label">Nama Kasus</label>
            <input type="text" name="nama" class="form-control" autofocus required>
        </div>

        <div class="mb-2">
            <label class="form-label">Kronologi</label>
            <textarea name="kronologi" class="form-control" rows="5" required></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kasuss.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
