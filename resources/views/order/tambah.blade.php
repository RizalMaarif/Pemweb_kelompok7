@include('dasboard.header')

<div class="container mt-5">
    <h2 class="my-3 text-center">Add Order</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            <form method="post" action="{{ route('order.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama Kurir</label>
                    <input type="text" name="order_kurir" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Ongkir</label>
                    <input type="number" name="order_ongkir" class="form-control" aria-describedby="emailHelp">
                </div>

                <hr class="my-5">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                    <select name="produk_kode" class="form-select">
                        <option value="">-- Pilih Produk --</option>
                        @isset($produks)
                        @foreach($produks as $produk)
                        <option value="{{ $produk->produk_kode }}">{{ $produk->produk_nama }}</option>
                        @endforeach
                        @endisset
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="number" name="detail_harga" class="form-control" aria-describedby="emailHelp">
                </div>
                <label for="exampleInputEmail1" class="form-label">Qty</label>
                <div class="input-group mb-3">
                    <input type="number" name="detail_jml" class="form-control" aria-describedby="emailHelp">
                    <button type="submit" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('order.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('dasboard.footer')
