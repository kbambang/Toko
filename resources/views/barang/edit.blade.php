@extends('layouts.master')

@section('title', 'Edit Barang')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ route('barang.index') }}">Barang</a></li>
    <li class="active">Edit Barang</li>
@endsection

@section('content')
    <div >
        <h3>Edit Barang</h3>

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form untuk mengedit barang -->
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Input Nama Barang -->
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="form-control" placeholder="Nama Barang" required>
            </div>

            <!-- Input Ukuran -->
            <div class="form-group">
                <label for="ukuran">Ukuran</label>
                <input type="text" id="ukuran" name="ukuran" value="{{ old('ukuran', $barang->ukuran) }}" class="form-control" placeholder="Ukuran" required>
            </div>

            <!-- Input Stok -->
            <div class="form-group">
                <label for="stok_barang">Stok</label>
                <input type="number" id="stok_barang" name="stok_barang" value="{{ old('stok_barang', $barang->stok_barang) }}" class="form-control" placeholder="Stok" required>
            </div>

            <!-- Input Harga -->
            <div class="form-group">
                <label for="harga_barang">Harga</label>
                <input type="number" id="harga_barang" name="harga_barang" value="{{ old('harga_barang', $barang->harga_barang) }}" class="form-control" placeholder="Harga" required>
            </div>

            <!-- Input Gambar Barang -->
            <div class="form-group">
                <label for="gambar_barang">Gambar Barang</label>
                <input type="file" id="gambar_barang" name="gambar_barang" class="form-control">
                
                <!-- Menampilkan gambar lama jika ada -->
                @if($barang->gambar_barang)
                    <div class="mt-2">
                        <label>Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $barang->gambar_barang) }}" alt="Gambar Barang" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-default">Batal</a>
        </form>
    </div>
@endsection
