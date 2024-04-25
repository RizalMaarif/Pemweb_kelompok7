@include('dasboard.header')


<div class="container">
    <h2 class="my-3">Master Produk</h2>
    <a href="{{ route('produk.tambah') }}" class="btn btn-outline-dark">Add Data</a><br>
    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Produk</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Qty</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @isset($tb_produk)
            @foreach($tb_produk as $row)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->produk_kode }}</td>
                <td>{{ $row->produk_nama }}</td>
                <td>Rp. {{ number_format($row->produk_hrg) }}</td>
                <td>{{ number_format($row->produk_stock) }} Pcs</td>
                <td>{{ $row->kategori->kat_nama }}</td>
                <td>
                    <a href="{{ route('produk.edit', $row->produk_id) }}" class="btn btn-warning btn-sm">Update</a>
                    <form action="{{ route('produk.destroy', $row->produk_id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endisset
        </tbody>
    </table>
</div>

@include('dasboard.footer')