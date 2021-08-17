<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with('siswa', 'petugas')->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $siswa = Siswa::get();
        $bulan = [
            ['nama' => 'Januari'],
            ['nama' => 'Februari'],
            ['nama' => 'Maret'],
            ['nama' => 'April'],
            ['nama' => 'Mei'],
            ['nama' => 'Juni'],
            ['nama' => 'Juli'],
            ['nama' => 'Agustus'],
            ['nama' => 'September'],
            ['nama' => 'Oktober'],
            ['nama' => 'November'],
            ['nama' => 'Desember'],
        ];

        $tahun = [
            ['tahun' => 2021],
            ['tahun' => 2022],
            ['tahun' => 2023],
        ];

        return view('pembayaran.create', compact('siswa', 'bulan', 'tahun'));
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'siswa_id' => 'required',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required',
            'jumlah_bayar' => 'required',
        ]);

        $attr['invoice'] = "INV" . date('dmY') . rand(100, 999);
        $attr['tanggal_bayar'] = date("Y-m-d");
        $attr['user_id'] = auth()->user()->id;
        $attr['status'] = 'Lunas';

        Pembayaran::create($attr);

        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan');
    }

    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
