@extends('layout')

@section('content')
<div class="col-12 p-4">
    <h4 class="mb-3">Daftar Jenis Kendaraan</h4>

    <a href="{{ route('jenis_kendaraan.create') }}" class="btn btn-primary btn-sm mb-3">+ Tambah Jenis</a>

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
            @foreach ($jenis as $j)
                <tr>
                    <td>{{ $j->id }}</td>
                    <td>{{ $j->name }}</td>
                    <td>
                        <a href="{{ route('jenis_kendaraan.edit', $j->id) }}"
                            class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('jenis_kendaraan.destroy', $j->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus jenis kendaraan ini?')">
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
