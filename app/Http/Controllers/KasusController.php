<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        $kasuss = Kasus::latest()->get();
        return view('kasus.index', compact('kasuss'));
    }

    public function create()
    {
        return view('kasus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kronologi' => 'required|string',
        ]);

        Kasus::create([
            'nama' => $request->nama,
            'kronologi' => $request->kronologi
        ]);

        return redirect()->route('kasuss.index')->with('success', 'Kasus berhasil ditambahkan.');
    }

    public function show(Kasus $kasus)
    {
        return view('kasus.show', compact('kasus'));
    }

    public function edit($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('kasus.edit', compact('kasus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kronologi' => 'required|string',
        ]);

        $kasus = Kasus::findOrFail($id);

        $kasus->update([
            'nama' => $request->nama,
            'kronologi' => $request->kronologi
        ]);

        return redirect()->route('kasuss.index')->with('success', 'Kasus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->delete();
        return redirect()->route('kasuss.index')->with('success', 'Kasus berhasil dihapus.');
    }
}
