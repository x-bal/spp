@extends('layouts.app', ['title' => 'Edit Spp'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Edit Spp</div>

                <div class="card-body">
                    <form action="{{ route('spp.update', $spp->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" id="tahun" class="form-control" value="{{ $spp->tahun }}">

                            @error('tahun')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" name="nominal" id="nominal" class="form-control" value="{{ $spp->nominal }}">

                            @error('nominal')
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