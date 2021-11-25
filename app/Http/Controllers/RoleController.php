<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'required'
        ]);
    
        $role = Role::create(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        return redirect()->route('admin.role.index')->with('message', '<div class="alert alert-success my-3">Role baru berhasil ditambahkan.</div>');
    }

    public function show($id)
    {
        $role = Role::where('id',$id)->with('permissions')->first();
        return view('admin.role.show', compact('role'));
    }

    public function edit($id)
    {
        $permissions = Permission::get();
        $role = Role::where('id',$id)->with('permissions')->first();
        $akses = $role->permissions->pluck('name')->toArray();
        return view('admin.role.edit', compact('role', 'permissions', 'akses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
            'permissions' => 'required'
        ]);
        
        $role = Role::where('id', $id)->first();
        $role->syncPermissions($request->permissions);
        $role->update(['name' => $request->role]);

        return redirect()->route('admin.role.index')->with('message', '<div class="alert alert-success my-3">Role baru berhasil diubah.</div>');
    }

    public function delete($id)
    {
        $delete = Role::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('admin.role.index')->with('message', '<div class="alert alert-success my-3">Role baru berhasil dihapus.</div>');
        }
    }
}
