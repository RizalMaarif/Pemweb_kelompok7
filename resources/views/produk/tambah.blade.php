@include('dasboard.header')


<div class="container mt-5">
    <h2 class="my-3 text-center">Add Produk</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            <form method="post" action="{{ route('produk.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="produk_nama" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number" name="produk_hrg" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Qty</label>
                    <input type="number" name="produk_stock" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Kategori</label>
                    <select name="kat_id" class="form-select">
                        <option value="">-- Pilih Kategori --</option>
                        @isset($$tb_produk)
                        @foreach($tb_kategori as $kat)
                        <option value="{{ $kat->kat_id }}">{{ $kat->kat_nama }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="produk_keterangan"></textarea>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <a href="{{ route('produk.index') }}" name="save" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dasboard.footer')