@include('dasboard.header')


@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="my-3 text-center">Update Produk</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            @foreach($produk as $row)
            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="produk_nama" class="form-control" value="{{ $row->produk_nama }}" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number" name="produk_hrg" class="form-control" value="{{ $row->produk_hrg }}" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Qty</label>
                    <input type="number" name="produk_stock" class="form-control" value="{{ $row->produk_stock }}" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Qty</label>
                    <select name="kat_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $kat)
                        <option value="{{ $kat->kat_id }}" {{ $row->kat_id == $kat->kat_id ? 'selected' : '' }}>{{ $kat->kat_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="produk_keterangan">{{ $row->produk_keterangan }}</textarea>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <a href="{{ route('produk.index') }}" name="save" class="btn btn-danger">Back</a>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection


@include('dasboard.footer')