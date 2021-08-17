@extends('layouts.app', ['title' => 'Edit Siswa'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit Siswa</div>

                <div class="card-body">
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}" disabled>

                            @error('nisn')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}">

                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="number" name="no_telp" id="no_telp" class="form-control" value="{{ $siswa->no_telp }}">

                            @error('no_telp')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="form-control">{{ $siswa->alamat }}</textarea>

                            @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select name="kelas_id" id="kelas" class="form-control">
                                <option disabled selected>-- Pilih Kelas --</option>
                                @foreach($kelas as $kls)
                                <option {{ $siswa->kelas_id == $kls->id ? 'selected' : '' }} value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
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
                                <option {{ $siswa->spp_id == $sp->id ? 'selected' : '' }} value="{{ $sp->id }}">{{ $sp->tahun }}</option>
                                @endforeach
                            </select>

                            @error('spp')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop