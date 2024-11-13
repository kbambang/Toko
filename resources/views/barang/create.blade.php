@extends('layouts.master')

@section('title', 'Tambah Barang')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Barang</li>
@endsection

@section('content')
    <div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Form action mengarah ke route barang.store dan menambahkan enctype untuk upload file -->
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="nama_barang">Nama Barang</label>
                <input type="text" id="nama_barang" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
            </div>

            <div>
                <label for="ukuran">Ukuran</label>
                <input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Ukuran" required>
            </div>

            <div>
                <label for="stok_barang">Stok</label>
                <input type="number" id="stok_barang" name="stok_barang" class="form-control" placeholder="Stok" required>
            </div>

            <div>
                <label for="harga_barang">Harga</label>
                <input type="number" id="harga_barang" name="harga_barang" class="form-control" placeholder="Harga" required>
            </div>

            <div>
                <label for="gambar_barang">Gambar Barang</label>
                <!-- Menambahkan input type file untuk gambar -->
                <input type="file" id="gambar_barang" name="gambar_barang" class="form-control" required>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-default">Batal</a>
        </form>
    </div>
@endsection
