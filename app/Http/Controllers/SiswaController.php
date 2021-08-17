<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::get();
        $spp = Spp::get();
        return view('siswa.create', compact('kelas', 'spp'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
        ]);

        $user = User::create([
            'username' => $request->nisn,
            'nama' => $request->nama,
            'password' => Hash::make('password'),
            'level' => 'Siswa'
        ]);

        $user->siswa()->create($attr);

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil ditambahkan');
    }

    public function show(Siswa $siswa)
    {
        //
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::get();
        $spp = Spp::get();

        return view('siswa.edit', compact('siswa', 'kelas', 'spp'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $attr = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'spp_id' => 'required',
        ]);

        $siswa->user()->update([
            'nama' => $request->nama
        ]);

        $siswa->update($attr);
        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->user()->delete();
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil didelete');
    }
}
