<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Univ;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    //
    public function index()
    {
        $kegiatan = Kegiatan::with('univ')->get();
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        $univ = Univ::all();
        return view('kegiatan.create', compact('univ'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'id_univ' => 'required',
        ]);

        Kegiatan::create($request->all());

        return redirect()->route('kegiatan.index')->with('message', '<div class="alert alert-success my-3">Kegiatan baru berhasil ditambahkan.</div>');
    }

    public function edit($id)
    {
        $univ = Univ::all();
        $kegiatan = Kegiatan::where('id', $id)->first();
        return view('kegiatan.edit', compact('kegiatan','univ'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'id_univ' => 'required',
        ]);

        Kegiatan::where('id',$id)->update($request->all());
        return redirect()->route('kegiatan.index')->with('message', '<div class="alert alert-success my-3">Detail kegiatan berhasil diubah.</div>');
    }

    public function delete($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('message', '<div class="alert alert-success my-3">Kegiatan '.$kegiatan->nama_kegiatan.' berhasil dihapus.</div>');
    }
}
