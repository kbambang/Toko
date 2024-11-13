@extends('layouts.master')

@section('title', 'Edit Kasir ')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Kasir</li>
@endsection

@section('content')
<div>
    <form action="{{ route('kasir.update', $kasir->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" value="{{ old('name', $kasir->name) }}" class="form-control" placeholder="Nama"  required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $kasir->email) }}" class="form-control" placeholder="Email"  required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password"  required>
        </div>
        <div>
            <label for="npassword_confirmationme">konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password"  required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kasir.index') }}" class="btn btn-default">Batal</a>
    </form>
</div>
@endsection