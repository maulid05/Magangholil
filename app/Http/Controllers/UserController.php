<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Nav, Role, RoleUser};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = Nav::All();

        $users = User::with('roles')->get();

        return view('user.index', compact('nav', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = Nav::All();

        $roles = Role::All();

        return view('user.create', compact('nav', 'roles'));
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

        $new_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'gender' => $request->gender,
            'nik' => $request->nik,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        //dd($now_user);
        RoleUser::create([
            'id_User' => $new_user->id,
            'id_Role' => $request->role
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

        $user = User::where('id', $id)->with('roles')->first();

        $roles = Role::All();

        return view('user.edit', compact('nav', 'user', 'roles'));
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

        $role_user = RoleUSer::where('id_User', $user->id)->first();
        if ($role_user && $request->role != null) {
            $role_user->update([
                'id_User' => $id,
                'id_Role' => $request->role
            ]);
        }elseif($request->role != null){
            RoleUser::create([
            'id_User' => $user->id,
            'id_Role' => $request->role
        ]);
        }

        if ($request->role != null) {
            return redirect()->route('user.index')->with('success', 'berhasil di update');
        }else{
            return redirect()->back()->with('success', 'Berhasil disimpan');
        }
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
