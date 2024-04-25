<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $tb_kategori = Kategori::all();
        return view('kategori.index');
    }

    public function create()
    {
        return view('kategori.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kat_nama' => 'required',
            'kat_keterangan' => 'required',
        ]);

        Kategori::create($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tb_kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kat_nama' => 'required',
            'kat_keterangan' => 'required',
        ]);

        $tb_kategori = Kategori::findOrFail($id);
        $tb_kategori->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tb_kategori = Kategori::findOrFail($id);
        $tb_kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data berhasil dihapus');
    }
}
