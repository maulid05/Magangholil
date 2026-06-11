<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Permision,
    Nav
};

class PermisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = Nav::all();

        $permisions = Permision::all();

        return view('permision.index', compact(
            'nav',
            'permisions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = Nav::all();

        return view('permision.create', compact(
            'nav'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|max:255'
        ]);

        Permision::create([
            'name' => $request->name,
            'route' => $request->route
        ]);

        return redirect()
            ->route('permision.index')
            ->with('success', 'Permission berhasil ditambahkan.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permision $permision)
    {
        $nav = Nav::all();

        return view('permision.edit', compact(
            'nav',
            'permision'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Permision $permision
    ) {
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|max:255'
        ]);

        $permision->update([
            'name' => $request->name,
            'route' => $request->route
        ]);

        return redirect()
            ->route('permision.index')
            ->with('success', 'Permission berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permision $permision)
    {
        $permision->delete();

        return redirect()
            ->route('permision.index')
            ->with('success', 'Permission berhasil dihapus.');
    }
}
