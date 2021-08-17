@extends('layouts.app', ['title' => 'Tambah Spp'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Tambah Spp</div>

                <div class="card-body">
                    <form action="{{ route('spp.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="number" name="tahun" id="tahun" class="form-control">

                            @error('tahun')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="number" name="nominal" id="nominal" class="form-control">

                            @error('nominal')
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