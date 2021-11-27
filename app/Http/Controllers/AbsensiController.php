<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Absensi;
use PDF;

class AbsensiController extends Controller
{
    //
    public function index()
    {
        $user = auth()->user();
        $absensi = Absensi::where('id_user', $user->id)
                            ->where('is_confirmed', 1)
                            ->with('kegiatan')
                            ->orderBy('updated_at', 'DESC')
                            ->get();

        return view('absensi.index', compact('absensi'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'foto' => 'required|mimes:jpg,jpeg,png' 
        ]);

        $filename = \Str::random(9).'_'.$request->foto->getClientOriginalName();
        $path = Storage::putFileAs('public/absensi', $request->foto, $filename);


        try {
            $absensi = new Absensi;
            
            $absensi->foto = $path;
            $absensi->is_confirmed = 0;
            $absensi->id_user = auth()->user()->id;
            $absensi->id_univ = auth()->user()->id_univ;
            $absensi->id_kegiatan = $request->id_kegiatan;

            $absensi->save();
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('message', '<div class="alert alert-danger my-3">Absensi gagal.</div>');
        }

        return redirect()->route('absensi.index')->with('message', '<div class="alert alert-success my-3">Absensi berhasil, menunggu konfirmasi ketua atau admin</div>');

    }

    public function list()
    {

        $user = auth()->user();
        $role = auth()->user()->getRoleNames()->first();
        if ( strtolower($role) == 'ketua') {
            $absensi = Absensi::where('id_univ', $user->id_univ)
                                ->with('kegiatan','user')
                                ->orderBy('updated_at','DESC')
                                ->get();
        } else {
            $absensi = Absensi::with('kegiatan','user')
                        ->orderBy('updated_at','DESC')
                        ->get();
        }
        return view('absensi.list-absensi', compact('absensi'));
    }

    public function approve($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update(['is_confirmed'=>1]);
        
        return redirect()->route('manajemen.absensi.index')->with('message', '<div class="alert alert-success my-3">Absensi berhasil dikonfirmasi</div>');        
    }

    public function eksport()
    {        
        
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView( $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }
}
