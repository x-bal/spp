<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        Kelas::create($attr);

        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil ditambahkan');
    }

    public function show(Kelas $kelas)
    {
        //
    }

    public function edit(Kelas $kela)
    {
        return view('kelas.edit', compact('kela'));
    }

    public function update(Request $request, Kelas $kela)
    {
        $attr = $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $kela->update($attr);
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil diupdate');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return redirect()->route('kelas.index')->with('success', 'Data Kelas berhasil didelete');
    }
}
