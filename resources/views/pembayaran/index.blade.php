@extends('layouts.app', ['title' => 'Data Pembayaran'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">Data Pembayaran</div>

                <div class="card-body">

                    <x-alert></x-alert>

                    <a href="{{ route('pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Nama Siswa</th>
                                    <th>Bulan Dibayar</th>
                                    <th>Tahun Dibayar</th>
                                    <th>Jumlah Bayar</th>
                                    <th>Status</th>
                                    <th>Petugas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pembayaran as $bayar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bayar->invoice }}</td>
                                    <td>{{ $bayar->tanggal_bayar }}</td>
                                    <td>{{ $bayar->siswa->nama }}</td>
                                    <td>{{ $bayar->bulan_dibayar }}</td>
                                    <td>{{ $bayar->tahun_dibayar }}</td>
                                    <td>{{ $bayar->jumlah_bayar }}</td>
                                    <td>{{ $bayar->status }}</td>
                                    <td>{{ $bayar->petugas->nama }}</td>
                                    <td>
                                        <a href="{{ route('pembayaran.edit', $bayar->id) }}" class="btn btn-success btn-sm">Edit</a>
                                        <form action="{{ route('pembayaran.destroy', $bayar->id) }}" method="post" style="display: inline;" onclick="return confirm('Hapus data?')">
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