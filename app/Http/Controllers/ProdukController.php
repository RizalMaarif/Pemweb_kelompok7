<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;


class ProdukController extends Controller
{
    public function index()
    {
        $tb_produk = Produk::all();
        return view('produk.index');
    }

    public function create()
    {
        return view('produk.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk_kode' => 'required',
            'produk_nama' => 'required',
            'produk_hrg' => 'required',
            'produk_stock' => 'required',
            'kat_id' => 'required',
        ]);
    }

    public function edit($id)
    {
        $tb_produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'produk_kode' => 'required',
            'produk_nama' => 'required',
            'produk_hrg' => 'required',
            'produk_stock' => 'required',
            'kat_id' => 'required',
        ]);

        $tb_produk = Produk::findOrFail($id);
        $tb_produk->update($validatedData);

        return redirect()->route('produk.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tb_produk = Produk::findOrFail($id);
        $tb_produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data berhasil dihapus');
    }
}
