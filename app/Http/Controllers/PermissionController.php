<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('id','DESC')->get();
        return view('permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'permission' => 'required',
        ]);
    
        Permission::create(['name' => $request->permission]);
        return redirect()->route('manajemen.permission.index')->with('message', '<div class="alert alert-success my-3">Permission baru berhasil ditambahkan.</div>');
    }

    public function edit($id)
    {
        $permission = Permission::where('id',$id)->first();
        return view('permission.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'permission' => 'required'
        ]);
        
        Permission::where('id', $id)->update(['name' => $request->permission]);
        return redirect()->route('manajemen.permission.index')->with('message', '<div class="alert alert-success my-3">Permission baru berhasil diubah.</div>');
    }

    public function delete($id)
    {
        $delete = Permission::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('manajemen.permission.index')->with('message', '<div class="alert alert-success my-3">Permission baru berhasil dihapus.</div>');
        }
    }
}
