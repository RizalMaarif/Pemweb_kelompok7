@include('header')


<div class="container mt-5"> 
    <h2 class="my-3 text-center">Update User</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 border rounded p-4">
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" name="user_nama" class="form-control" value="{{ $user->user_nama }}" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" name="user_email" class="form-control" value="{{ $user->user_email }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="user_password" class="form-control" value="{{ $user->user_password }}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <textarea class="form-control" name="user_alamat">{{ $user->user_alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label">No.Hp</label>
                    <input type="text" name="user_hp" class="form-control" value="{{ $user->user_hp }}">
                </div><br>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('footer')

