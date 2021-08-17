@extends('layouts.app', ['title' => 'Edit Kelas'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit Kelas</div>

                <div class="card-body">
                    <form action="{{ route('kelas.update', $kela->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="nama_kelas">Nama Kelas</label>
                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ $kela->nama_kelas }}">

                            @error('nama_kelas')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                            <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" value="{{ $kela->kompetensi_keahlian }}">

                            @error('kompetensi_keahlian')
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