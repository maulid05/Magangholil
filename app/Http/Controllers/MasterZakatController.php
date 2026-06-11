<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    MasterZakat,
    Nav,
    JenisZakat,
    User
};

class MasterZakatController extends Controller
{
    public function index()
    {
        $nav = Nav::all();

        $masterZakats = MasterZakat::with([
            'jenisZakat',
            'pemberi',
            'penerima'
        ])->get();

        return view('zakat.index', compact(
            'nav',
            'masterZakats'
        ));
    }

    public function create()
    {
        $nav = Nav::all();

        $jenisZakats = JenisZakat::all();

        $users = User::all();

        return view('zakat.create', compact(
            'nav',
            'jenisZakats',
            'users'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jenis_zakat' => 'required|exists:jenis_zakats,id',
            'id_pemberi' => 'required|exists:users,id',
            'id_penerima' => 'nullable|exists:users,id',
            'status' => 'required'
        ]);

        MasterZakat::create([
            'id_jenis_zakat' => $request->id_jenis_zakat,
            'id_pemberi' => $request->id_pemberi,
            'id_penerima' => $request->id_penerima,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('zakat.index')
            ->with('success', 'Data zakat berhasil ditambahkan.');
    }

    public function edit(MasterZakat $masterZakat)
    {
        $nav = Nav::all();

        $jenisZakats = JenisZakat::all();

        $users = User::all();

        return view('zakat.edit', compact(
            'nav',
            'masterZakat',
            'jenisZakats',
            'users'
        ));
    }

    public function update(Request $request, MasterZakat $masterZakat)
    {
        $request->validate([
            'id_jenis_zakat' => 'required|exists:jenis_zakats,id',
            'id_pemberi' => 'required|exists:users,id',
            'id_penerima' => 'nullable|exists:users,id',
            'status' => 'required'
        ]);

        $masterZakat->update([
            'id_jenis_zakat' => $request->id_jenis_zakat,
            'id_pemberi' => $request->id_pemberi,
            'id_penerima' => $request->id_penerima,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('zakat.index')
            ->with('success', 'Data zakat berhasil diperbarui.');
    }

    public function destroy(MasterZakat $masterZakat)
    {
        $masterZakat->delete();

        return redirect()
            ->route('zakat.index')
            ->with('success', 'Data zakat berhasil dihapus.');
    }
}