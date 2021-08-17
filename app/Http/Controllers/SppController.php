<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::get();
        return view('spp.index', compact('spp'));
    }

    public function create()
    {
        return view('spp.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        Spp::create($attr);
        return redirect()->route('spp.index')->with('success', 'Data Spp berhasil ditambahkan');
    }

    public function show(Spp $spp)
    {
        //
    }

    public function edit(Spp $spp)
    {
        return view('spp.edit', compact('spp'));
    }

    public function update(Request $request, Spp $spp)
    {
        $attr = $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $spp->update($attr);
        return redirect()->route('spp.index')->with('success', 'Data Spp berhasil diupdate');
    }

    public function destroy(Spp $spp)
    {
        $spp->delete();
        return redirect()->route('spp.index')->with('success', 'Data Spp berhasil didelete');
    }
}
