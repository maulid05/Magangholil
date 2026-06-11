<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    JenisZakat,
    Nav
};

class JenisZakatController extends Controller
{
    public function index()
    {
        $nav = Nav::all();

        $jenisZakats = JenisZakat::with('petugas')->get();

        return view('jeniszakat.index', compact(
            'nav',
            'jenisZakats'
        ));
    }

    public function create()
    {
        $nav = Nav::all();

        return view('jeniszakat.create', compact(
            'nav'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi_singkat' => 'required',
            'wallet' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('jeniszakat', 'public');
        }

        JenisZakat::create([
            'name' => $request->name,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'wallet' => $request->wallet,
            'gambar' => $gambar
        ]);

        return redirect()
            ->route('jeniszakat.index')
            ->with('success', 'Jenis zakat berhasil ditambahkan.');
    }


    public function edit(string $id)
    {
        $nav = Nav::all();

        $jenisZakat = JenisZakat::where('id', $id)->first();

        return view('jeniszakat.edit', compact(
            'nav',
            'jenisZakat'
        ));
    }

    public function update(Request $request, string $id)
    {
        $jenisZakat = JenisZakat::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'deskripsi_singkat' => 'required',
            'wallet' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $gambar = $jenisZakat->gambar;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('jeniszakat', 'public');
        }

        $jenisZakat->update([
            'name' => $request->name,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'wallet' => $request->wallet,
            'gambar' => $gambar
        ]);

        return redirect()
            ->route('jeniszakat.index')
            ->with('success', 'Jenis zakat berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $jenisZakat = JenisZakat::where('id', $id)->first();
        $jenisZakat->delete();

        return redirect()
            ->route('jeniszakat.index')
            ->with('success', 'Jenis zakat berhasil dihapus.');
    }
}
