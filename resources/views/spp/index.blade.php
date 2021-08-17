@extends('layouts.app', ['title' => 'Data Spp'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Data Spp</div>

                <div class="card-body">

                    <x-alert></x-alert>

                    <a href="{{ route('spp.create') }}" class="btn btn-primary mb-3">Tambah Spp</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nominal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($spp as $sp)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sp->tahun }}</td>
                                    <td>{{ $sp->nominal }}</td>
                                    <td>
                                        <a href="{{ route('spp.edit', $sp->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('spp.destroy', $sp->id) }}" method="post" style="display: inline;" onclick="return confirm('Hapus data?')">
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