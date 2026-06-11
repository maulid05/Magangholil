<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    RolePermision,
    Role,
    Permision,
    Nav
};

class RolePermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = Nav::all();

        $rolePermisions = RolePermision::with([
            'role',
            'permision'
        ])->get();

        return view('role-permision.index', compact(
            'nav',
            'rolePermisions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = Nav::all();

        $roles = Role::all();

        $permisions = Permision::all();

        return view('role-permision.create', compact(
            'nav',
            'roles',
            'permisions'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_role' => 'required|exists:roles,id',
            'id_permision' => 'required|exists:permisions,id',
        ]);

        RolePermision::create([
            'id_role' => $request->id_role,
            'id_permision' => $request->id_permision,
        ]);

        return redirect()
            ->route('role-permision.index')
            ->with('success', 'Role Permission berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RolePermision $rolePermision)
    {
        return view('role-permision.show', compact(
            'rolePermision'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RolePermision $rolePermision)
    {
        $nav = Nav::all();

        $roles = Role::all();

        $permisions = Permision::all();

        return view('role-permision.edit', compact(
            'nav',
            'rolePermision',
            'roles',
            'permisions'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        RolePermision $rolePermision
    ) {
        $request->validate([
            'id_role' => 'required|exists:roles,id',
            'id_permision' => 'required|exists:permisions,id',
        ]);

        $rolePermision->update([
            'id_role' => $request->id_role,
            'id_permision' => $request->id_permision,
        ]);

        return redirect()
            ->route('role-permision.index')
            ->with('success', 'Role Permission berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RolePermision $rolePermision)
    {
        $rolePermision->delete();

        return redirect()
            ->route('role-permision.index')
            ->with('success', 'Role Permission berhasil dihapus.');
    }
}
