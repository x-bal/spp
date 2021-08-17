@extends('layouts.app', ['title' => 'Edit User'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}">

                            @error('username')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->nama }}">

                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">

                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <option disabled selected>-- Pilih Level --</option>
                                <option {{ $user->level == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                                <option {{ $user->level == 'Petugas' ? 'selected' : '' }} value="Petugas">Petugas</option>
                                <option {{ $user->level == 'Siswa' ? 'selected' : '' }} value="Siswa">Siswa</option>
                            </select>

                            @error('level')
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