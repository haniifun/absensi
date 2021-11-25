<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Univ;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('univ','divisi')->get();
        return view('manajemen-user.index', compact('users'));
    }

    public function create()
    {
        $univ = Univ::all();
        $divisi = Divisi::all();
        return view('manajemen-user.create', compact('univ','divisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $store = User::create($request->all());

        return redirect('manajemen-user');
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('admin.manajemen-user.index')->with('message', '<div class="alert alert-success my-3">'.$user->nama.' berhasil dihapus.</div>');
    }
}
