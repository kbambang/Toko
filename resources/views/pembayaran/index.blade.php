@extends('layouts.master')

@section('title', 'Pembayaran ')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pembayaran</li>
@endsection

@section('content')
<div>
    <a href="{{ route('pembayaran.create') }}" class="btn btn-success mb-3">Tambah Pembayaran</a>
    @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Barang -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                <td>Nama Pembayaran</td>
                <td >Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembayarans as $pembayaran)
                <tr>
                    <td>{{ $pembayaran->jenis_pembayaran }}</td>
                    <td>
                        <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection