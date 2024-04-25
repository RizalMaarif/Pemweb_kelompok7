@include('dasboard.header')

<div class="container">
    <h2 class="my-3">Master User</h2>
    <a href="{{ route('user.tambah') }}" class="btn btn-outline-dark">Add Data</a><br>
    <table class="table table-hover mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">No.Hp</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @isset($users)
            @forelse($users as $user)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $user->user_nama }}</td>
                <td>{{ $user->user_email }}</td>
                <td>{{ $user->user_alamat }}</td>
                <td>{{ $user->user_hp }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Update</a>
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
            </tr>
            @endforelse
            @endisset
        </tbody>
    </table>
</div>

@include('dasboard.footer')