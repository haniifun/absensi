<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KetuaController extends Controller
{    
    public function index()
    {
        $users = User::whereHas('roles', function($q) {
                    $q->where('name', 'ketua');
                })->with('univ','divisi')
                ->orderBy('id', 'DESC')
                ->get();

        return view('ketua.index', compact('users'));
    }

    public function angkatKetua($id)
    {
        $user = User::findOrFail($id);
        
        $ketua = User::whereHas('roles', function($q) {
                            $q->where('name', 'ketua');
                        })->where('id_univ', $user->id_univ)
                        ->first();
        if (!$ketua) {
            $user->removeRole('anggota');
            $user->assignRole('ketua');
        } else {
            return redirect()->route('manajemen.anggota.index')->with('message', '<div class="alert alert-danger my-3">Ketua sudah ada, copot ketua sekarang terlebih dahulu untuk memilih ketua baru.</div>');
        }
        return redirect()->route('manajemen.ketua.index')->with('message', '<div class="alert alert-success my-3">Berhasil! '.$user->nama.' sekarang menjadi ketua</div>');
    }

    public function copotKetua($id)
    {
        $user = User::findOrFail($id);
        $user->removeRole('ketua');
        $user->assignRole('anggota');

        return redirect()->route('manajemen.anggota.index')->with('message', '<div class="alert alert-success my-3">Ketua berhasil diturunkan, silahkan pilih ketua baru.</div>');
    }
}
