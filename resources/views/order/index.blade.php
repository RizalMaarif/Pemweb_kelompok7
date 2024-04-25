@include('dasboard.header')

<div class="container">
    <h2 class="my-3">Master Order</h2>
    <a href="{{ route('order.tambah') }}" class="btn btn-outline-dark">Add Data</a><br>
    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Order</th>
                <th scope="col">Nama Kurir</th>
                <th scope="col">Ongkir</th>
                <th scope="col">Tanggal Order</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @isset($orders)
            @php $no = 1 @endphp
            @forelse($orders as $order)
                @php
                    if ($order->order_batal == 0) {
                        $status = '<p class="text-warning">Draft</p>';
                        $edit = route("order.edit", ['id' => base64_encode($order->order_kode)]);
                    } elseif ($order->order_batal == 1) {
                        $status = '<p class="text-success">Ordered</p>';
                        $edit = route("order.edit", ['id' => base64_encode($order->order_kode), 'status' => base64_encode($order->order_batal)]);
                    } elseif ($order->order_batal == 2) {
                        $status = '<p class="text-danger">Canceled</p>';
                        $edit = route("order.edit", ['id' => base64_encode($order->order_kode), 'status' => base64_encode($order->order_batal)]);
                    }
                @endphp
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $order->order_kode }}</td>
                    <td>{{ $order->order_kurir }}</td>
                    <td>Rp. {{ number_format($order->order_ongkir) }}</td>
                    <td>{{ $order->order_tgl }}</td>
                    <td>{!! $status !!}</td>
                    <td>
                        <a href="{{ $edit }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('order.delete', ['id' => base64_encode($order->order_kode)]) }}" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data order kosong.</td>
                </tr>
            @endforelse
            @endisset
        </tbody>
    </table>
</div>

@include('dasboard.footer')
 