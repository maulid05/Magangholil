<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Nav};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = Nav::All();

        $users = User::All();

        return view('user.index', compact('nav', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = Nav::All();

        return view('user.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ///dd($request);
        $request->validate([
            'name',
            'email',
            'password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'nik' => $request->nik,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nav = Nav::All();

        $user = User::where('id', $id)->first();

        return view('user.edit', compact('nav', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $user = User::where('id', $id)->first();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'nik' => $request->nik,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('user.index')->with('success', 'berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();

        $user->delete();

        return redirect()->route('user.index')->with('dangger', 'Berhasil di hapus');
    }
}
