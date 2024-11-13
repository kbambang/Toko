@extends('layouts.master')

@section('title', 'Daftar Transaksi')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Transaksi</li>
@endsection

@section('content')

    <a href="{{ route('transaksis.create') }}" class="btn btn-success">Tambah Transaksi</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Pembayaran</th>
                <th>Uang Diterima</th>
                <th>Kembalian</th>
                <th>Total Harga</th>
                <th>Cetak Struk</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->barang->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->pembayaran->jenis_pembayaran }}</td>
                    
                    <td>Rp{{ number_format($transaksi->uang_diterima, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td><a href="{{ route('transaksis.cetakStruk', $transaksi->id) }}" class="btn btn-primary" target="_blank">Cetak Struk</a></td>
                    <td>
                        <!-- Tombol untuk mengedit atau menghapus transaksi -->
                        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if(Auth::user()->role == 'owner')
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Pembayaran</th>
                <th>Uang Diterima</th>
                <th>Kembalian</th>
                <th>Total Harga</th>
                <th>Cetak Struk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->barang->nama_barang }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->pembayaran->jenis_pembayaran }}</td>
                    
                    <td>Rp{{ number_format($transaksi->uang_diterima, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($transaksi->kembalian, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td><a href="{{ route('transaksis.cetakStruk', $transaksi->id) }}" class="btn btn-primary" target="_blank">Cetak Struk</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
