@extends('layouts.app', ['title' => 'Tambah Pembayaran'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Tambah Pembayaran</div>

                <div class="card-body">
                    <form action="{{ route('pembayaran.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="siswa">Siswa</label>
                            <select name="siswa_id" id="siswa" class="form-control">
                                <option disabled selected>-- Pilih Siswa -- </option>
                                @foreach($siswa as $sw)
                                <option value="{{ $sw->id }}">({{ $sw->nisn }}) {{ $sw->nama }}</option>
                                @endforeach
                            </select>

                            @error('siswa_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select name="bulan_dibayar" id="bulan" class="form-control">
                                <option disabled selected>-- Pilih bulan -- </option>
                                @foreach($bulan as $bln)
                                <option value="{{ $bln['nama'] }}">{{ $bln['nama'] }}</option>
                                @endforeach
                            </select>

                            @error('bulan_dibayar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select name="tahun_dibayar" id="tahun" class="form-control">
                                <option disabled selected>-- Pilih tahun -- </option>
                                @foreach($tahun as $thn)
                                <option value="{{ $thn['tahun'] }}">{{ $thn['tahun'] }}</option>
                                @endforeach
                            </select>

                            @error('tahun_dibayar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="jumlah_bayar">Jumlah Bayar</label>
                            <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control">

                            @error('jumlah_bayar')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop