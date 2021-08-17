@extends('layouts.app', ['title' => 'Tambah Siswa'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Tambah Siswa</div>

                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" name="nisn" id="nisn" class="form-control">

                            @error('nisn')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">

                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="number" name="no_telp" id="no_telp" class="form-control">

                            @error('no_telp')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>

                            @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas" class="form-control">
                                <option disabled selected>-- Pilih Kelas --</option>
                                @foreach($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                @endforeach
                            </select>

                            @error('kelas')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="spp">Spp</label>
                            <select name="spp_id" id="spp" class="form-control">
                                <option disabled selected>-- Pilih Spp --</option>
                                @foreach($spp as $sp)
                                <option value="{{ $sp->id }}">{{ $sp->tahun }}</option>
                                @endforeach
                            </select>

                            @error('spp')
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