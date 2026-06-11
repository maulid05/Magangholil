<?php

namespace App\Http\Controllers;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNavRequest;
use App\Http\Requests\UpdateNavRequest;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $navs = Nav::all();

        return view('nav.index', compact('navs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $navs = Nav::all();

        return view('nav.create', compact('navs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ///dd($request);
        $request->validate([
            'name' => 'required|max:255',
            'route' => 'required|max:255',
        ]);

        Nav::create([
            'name' => $request->name,
            'route' => $request->route,
        ]);

        return redirect()
            ->route('nav.index')
            ->with('success', 'Navigasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Nav $nav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navs = Nav::where('id', $id)->first();

        //dd($navs);
        return view('nav.edit', compact('navs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nav = Nav::where('id', $id)->first();

        $nav->update([
            'name' => $request->name,
            'route' => $request->route,
        ]);

        return redirect()
            ->route('nav.index')
            ->with('success', 'Navigasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nav = Nav::where('id', $id)->first();

        $nav->delete();

        return redirect()->route('nav.index')->with('dangger', 'berhasil di Hapus');
    }
}
