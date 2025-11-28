<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function index()
    {
        $jenis = JenisKendaraan::latest()->get();
        return view('jenis_kendaraan.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis_kendaraan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:jenis_kendaraans,name',
        ]);

        JenisKendaraan::create([
            'name' => $request->name
        ]);

        return redirect()->route('jenis_kendaraan.index')
            ->with('success', 'Jenis kendaraan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisKendaraan::findOrFail($id);
        return view('jenis_kendaraan.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|max:255|unique:jenis_kendaraans,name,$id",
        ]);

        $jenis = JenisKendaraan::findOrFail($id);

        $jenis->update([
            'name' => $request->name
        ]);

        return redirect()->route('jenis_kendaraan.index')
            ->with('success', 'Jenis kendaraan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenis = JenisKendaraan::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis_kendaraan.index')
            ->with('success', 'Jenis kendaraan berhasil dihapus.');
    }
}
