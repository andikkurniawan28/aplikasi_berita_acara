@extends('layout')

@section('content')
<div class="col-6 p-4">
    <h4 class="mb-3">Edit Material</h4>

    <form action="{{ route('material.update', $material->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label class="form-label">Nama Material</label>
            <input type="text" name="name" class="form-control"
                   value="{{ $material->name }}" required>
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('material.index') }}" class="btn btn-secondary">Kembali</a>

    </form>
</div>
@endsection
