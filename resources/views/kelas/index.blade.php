@extends('layouts.app', ['title' => 'Data Kelas'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Data Kelas</div>

                <div class="card-body">

                    <x-alert></x-alert>

                    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($kelas as $kls)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kls->nama_kelas }}</td>
                                    <td>{{ $kls->kompetensi_keahlian }}</td>
                                    <td>
                                        <a href="{{ route('kelas.edit', $kls->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('kelas.destroy', $kls->id) }}" method="post" style="display: inline;" onclick="return confirm('Hapus data?')">
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