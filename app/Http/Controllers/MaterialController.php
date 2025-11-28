<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $material = Material::latest()->get();
        return view('material.index', compact('material'));
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:materials,name',
        ]);

        Material::create([
            'name' => $request->name
        ]);

        return redirect()->route('material.index')
            ->with('success', 'Material berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('material.edit', compact('material'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|max:255|unique:materials,name,$id",
        ]);

        $material = Material::findOrFail($id);

        $material->update([
            'name' => $request->name
        ]);

        return redirect()->route('material.index')
            ->with('success', 'Material berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('material.index')
            ->with('success', 'Material berhasil dihapus.');
    }
}
