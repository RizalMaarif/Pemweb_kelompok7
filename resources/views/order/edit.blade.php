@extends('dasboard.header')

<div class="container mt-5"> 
    <form method="post" action="{{ route('order.update', ['id' => base64_encode($order->order_kode)]) }}">
    @csrf
    @method('PUT')
    <h2 class="my-3 text-center">Update Order</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Order</label>
                    <input type="datetime" name="order_tgl" class="form-control" value="{{ date("Y-m-d H:i:s") }}" aria-describedby="emailHelp" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama Kurir</label>
                    <input type="text" name="order_kurir" class="form-control" value="{{ $order->order_kurir }}" aria-describedby="emailHelp" @if(isset($readonly)) {{ $readonly }} @endif>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Ongkir</label>
                    <input type="number" name="order_ongkir" class="form-control" value="{{ $order->order_ongkir }}" aria-describedby="emailHelp" @if(isset($readonly)) {{ $readonly }} @endif>
                </div>

                <hr class="my-5">
                @if(!isset($readonly))
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <select name="produk_kode" class="form-select">
                            <option value="">-- Pilih Produk --</option>
                            @isset(produks)
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
                    <div class="input-group mb-5">
                        <input type="number" name="detail_jml" class="form-control" aria-describedby="emailHelp">
                        <button type="submit" name="addDetail" class="btn btn-success"><i class="bi bi-plus-lg"></i></button>
                    </div>
                @endif

            </div>

            @if(isset($order))
            <div class="col-md-12">
                <div class="container px-0">
                    <table class="table table-hover mt-5">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset(orderDetails)
                            @foreach($orderDetails as $key => $detail)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $detail->produk_kode }}</td>
                                    <td>{{ $detail->produk->produk_nama }}</td>
                                    <td>Rp.{{ number_format($detail->detail_harga) }}</td>
                                    <td>{{ $detail->detail_jml }}</td>
                                    <td>Rp.{{ number_format($detail->detail_harga * $detail->detail_jml) }}</td>
                                    <td>
                                        @if(!isset($readonly))
                                        <a href="{{ route('order.edit', ['id' => base64_encode($order->order_kode), 'del' => base64_encode($detail->order_detail_id)]) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

        </div>
        @if(!isset($readonly))
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        @elseif(base64_decode(request('status')) == 1)
            <button type="submit" name="save" class="btn btn-danger">Batal</button>
        @endif
        <a href="{{ route('order.index') }}" class="btn btn-danger">Back</a>
    </form>
</div>

@include('dasboard.footer')
