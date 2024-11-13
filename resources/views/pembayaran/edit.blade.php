@extends('layouts.master')

@section('title', 'Edit Pembayaran ')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Pembayaran</li>
@endsection

@section('content')
<div>
    <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="jenis_pembayaran">Pembayaran</label>
            <input type="text" name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" value="{{ $pembayaran->jenis_pembayaran }}" placeholder="nama Pembayaran" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" >Simpan</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-default" >Batal</a>
    </form>
</div>
@endsection