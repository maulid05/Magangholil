<?php

namespace App\Http\Controllers;

use App\Models\{Role, Nav};
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = Nav::All();

        $roles = Role::All();

        return view('role.index', compact('nav', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = Nav::All();

        return view('role.create', compact('nav'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Berhasil Di Tambahkan ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nav = Nav::All();

        $roles = Role::where('id', $id)->first();

        return view('role.edit', compact('nav', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roles = Role::where('id', $id)->first();

        $roles->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')->with('success', 'Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {                
        $roles = Role::where('id', $id)->first();
        $roles->delete();

        return redirect()->route('roles.index')->with('success', 'Berhasil Di Hapus');
    }
}
