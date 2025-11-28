@extends('layout')

@section('content')
<div class="col-12 p-4">
    <h4 class="mb-3">Daftar Material</h4>

    <a href="{{ route('material.create') }}" class="btn btn-primary btn-sm mb-3">+ Tambah Material</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($material as $j)
                <tr>
                    <td>{{ $j->id }}</td>
                    <td>{{ $j->name }}</td>
                    <td>
                        <a href="{{ route('material.edit', $j->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('material.destroy', $j->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus Material ini?')">
                                Hapus
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
