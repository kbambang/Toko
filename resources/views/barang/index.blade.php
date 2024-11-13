@extends('layouts.master')

@section('title', 'Barang')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Barang</li>
@endsection

@section('content')
@if(Auth::user()->role == 'admin')
    <div>
        <!-- Tombol Tambah Barang -->
        <a href="{{ route('barang.create') }}" class="btn btn-success mb-3">Tambah Barang</a>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabel Barang -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->ukuran }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                        </td>
                        <td>
                            <!-- Tombol aksi edit dan hapus -->
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            
                            <!-- Form hapus -->
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
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
    </div>
    @endif
    @if(Auth::user()->role == 'kasir')
    <div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
         
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->ukuran }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    @if(Auth::user()->role == 'owner')
    <div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Ukuran</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
         
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->ukuran }}</td>
                        <td>{{ $barang->stok_barang }}</td>
                        <td>Rp {{ number_format($barang->harga_barang, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

@endsection
