@extends('layouts.master')

@section('title', 'Tambah Kasir ')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kasir</li>
@endsection

@section('content')
    <div>
        <form action="{{ route('kasir.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nama"  required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div>
                <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('kasir.index') }}" class="btn btn-default">Batal</a>
        </form>
    </div>
@endsection
