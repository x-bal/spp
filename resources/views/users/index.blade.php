@extends('layouts.app', ['title' => 'Data User'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Data User</div>

                <div class="card-body">

                    <x-alert></x-alert>

                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->level }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline;" onclick="return confirm('Hapus data?')">
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