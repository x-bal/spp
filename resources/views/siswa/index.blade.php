@extends('layouts.app', ['title' => 'Data Siswa'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Data Siswa</div>

                <div class="card-body">

                    <x-alert></x-alert>

                    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nisn</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($siswa as $sw)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sw->nisn }}</td>
                                    <td>{{ $sw->nama }}</td>
                                    <td>{{ $sw->alamat }}</td>
                                    <td>
                                        <a href="{{ route('siswa.edit', $sw->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('siswa.destroy', $sw->id) }}" method="post" style="display: inline;" onclick="return confirm('Hapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop