@include('dasboard.header')

<div class="container">
    <h2 class="my-3">Master Kategori</h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-outline-dark">Add Data</a><br>
    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @isset($tb_kategori)
            @foreach($tb_kategori as $row)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $row->kat_nama }}</td>
                <td>{{ $row->kat_keterangan }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $row->kat_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kategori.destroy', $row->kat_id) }}" method="POST" style="display: inline;">
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