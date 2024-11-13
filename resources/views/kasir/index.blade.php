@extends('layouts.master')

@section('title', 'Kasir')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard" class="btn btn-success mb-3"></i> Home</a></li>
    <li class="active">Kasir</li>
@endsection

@section('content')
@if(Auth::user()->role == 'admin')
    <div>
        <a href="{{ route('kasir.create') }}" class="btn btn-success">Tambah Kasir</a>
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Barang -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($kasirs as $kasir)
                    <tr>
                        <td>{{ $kasir->name }}</td>
                        <td>{{ $kasir->email }}</td>
                        <td>{{ $kasir->password }}</td>
                        <td>
                            <a href="{{ route('kasir.edit', $kasir->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('kasir.destroy', $kasir->id) }}" method="POST" style="display:inline;">
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
    @endif
    @if(Auth::user()->role == 'owner')
    <div>

    <!-- Tabel Barang -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Password</td>
             
                </tr>
            </thead>
            <tbody>
                @foreach ($kasirs as $kasir)
                    <tr>
                        <td>{{ $kasir->name }}</td>
                        <td>{{ $kasir->email }}</td>
                        <td>{{ $kasir->password }}</td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

@endsection
