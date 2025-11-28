@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Edit Kasus</h4>

    <form action="{{ route('kasuss.update', $kasus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="form-label">Nama Kasus</label>
            <input type="text" name="nama" class="form-control" value="{{ $kasus->nama }}" autofocus required>
        </div>

        <div class="mb-2">
            <label class="form-label">Kronologi</label>
            <textarea name="kronologi" class="form-control" rows="5" required>{{ $kasus->kronologi }}</textarea>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('kasuss.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
