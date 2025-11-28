@extends('layout')

@section('content')
<div class="col-12 p-4">
    <h4 class="mb-3">Daftar Kasus</h4>

    <a href="{{ route('kasuss.create') }}" class="btn btn-primary btn-sm mb-3">+ Tambah Kasus</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kronologi</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kasuss as $k)
                <tr>
                    <td>{{ $k->id }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->kronologi }}</td>
                    <td>
                        <a href="{{ route('kasuss.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kasuss.destroy', $k->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus kasus ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
