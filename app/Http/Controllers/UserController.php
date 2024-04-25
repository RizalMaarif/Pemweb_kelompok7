<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        dd($users);
        return view('user.index', compact('users'));
    }

    public function read($id)
    {
        $users = User::findOrFail($id);
        dd($users);
        return view('user.read', compact('users'));
    }


    public function tambah()
    {
        return view('user.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_nama' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users',
            'user_password' => 'required|string|min:6',
            'user_alamat' => 'nullable|string',
            'user_hp' => 'nullable|string',
        ]);

        $user = new User;
        $user->user_nama = $validatedData['user_nama'];
        $user->user_email = $validatedData['user_email'];
        $user->user_password = bcrypt($validatedData['user_password']); // Hash password
        $user->user_alamat = $validatedData['user_alamat'];
        $user->user_hp = $validatedData['user_hp'];
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_nama' => 'required',
            'user_email' => 'required|email',
            'user_alamat' => 'required',
            'user_hp' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('user.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}

