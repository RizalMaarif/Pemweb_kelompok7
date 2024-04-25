@include('dasboard.header')

<div class="container mt-5">
    <h2 class="my-3 text-center">Add Kategori</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            <form method="post" action="{{ route('kategori.store') }}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama*</label>
                    <input type="text" name="kat_nama" class="form-control" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Keterangan*</label>
                    <textarea class="form-control" name="kat_keterangan"></textarea>
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


@include('dasboard.footer')