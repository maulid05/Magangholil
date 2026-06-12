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
        if (Auth()->user()->roles->first()->id == 1) {
            $masterZakats = MasterZakat::with([
            'jenisZakat',
            'pemberi',
            'penerima'
        ])->get();

        }elseif(Auth()->user()->roles->first()->id == 3){
            $masterZakats = MasterZakat::with([
                'jenisZakat',
                'pemberi',
                'penerima'
            ])->where('id_penerima', Auth()->user()->id)->get();
        }elseif(Auth()->user()->roles->first()->id == 2){
            $masterZakats = MasterZakat::with([
                'jenisZakat',
                'pemberi',
                'penerima'
            ])->where('id_pemberi', Auth()->user()->id)->get();
        }
        return view('zakat.index', compact(
            'nav',
            'masterZakats'
        ));
    }

    public function create(string $id)
    {
        $nav = Nav::all();

        $jenisZakats = JenisZakat::where('id', $id)->first();

        $users = User::all();

        $masterZakat = MasterZakat::all();

        return view('zakat.create', compact(
            'nav',
            'masterZakat',
            'jenisZakats',
            'users'
        ));
    }

    public function store(Request $request)
    {
        //dd($request);
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
            ->route('dashboard')
            ->with('success', 'Data zakat berhasil ditambahkan.');
    }
    public function show(string $id)
    {
        $nav = Nav::all();

        $masterZakat = JenisZakat::with('petugas')
            ->where('id',$id)->first();

        $users = User::all();

        $jenisZakats = MasterZakat::all();

        return view('zakat.show', compact(
            'nav',
            'users',
            'masterZakat',
            'jenisZakats'
        ));
    }
    public function edit(string $id)
    {

        $nav = Nav::all();

        $jenisZakats = JenisZakat::all();

        $users = User::all();

        $masterZakat = MasterZakat::where('id', $id)->first();

        return view('zakat.edit', compact(
            'nav',
            'masterZakat',
            'jenisZakats',
            'users'
        ));
    }

    public function update(Request $request, string $id)
    {
        //dd($request);

        $masterZakat =  MasterZakat::where('id', $id)->first();
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