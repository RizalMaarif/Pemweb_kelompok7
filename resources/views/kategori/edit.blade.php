@include('dasboard.header')

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="my-3 text-center">Update Kategori</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            <form method="post" action="{{ route('kategori.update', $kategori->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="kat_nama" class="form-control" value="{{ $kategori->kat_nama }}" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="kat_keterangan">{{ $kategori->kat_keterangan }}</textarea>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <a href="{{ route('kategori.index') }}" name="save" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@include('dasboard.footer')