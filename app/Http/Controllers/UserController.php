<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);

        $attr['password'] = \Hash::make($request->input('password'));

        User::create($attr);

        return redirect()->route('users.index')->with('success', 'Data User berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $attr = $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'level' => 'required',
        ]);

        if ($request->input('password') == null) {
            $attr['password'] = $user->password;
        } else {
            $attr['password'] = \Hash::make($request->input('password'));
        }

        $user->update($attr);
        return redirect()->route('users.index')->with('success', 'Data User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data User berhasil didelete');
    }
}
