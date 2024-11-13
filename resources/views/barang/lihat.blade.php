@extends('layouts.master')

@section('title', 'Lihat Barang ')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Barang</li>
@endsection

@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <td><img src="{{ asset('storage/' . $barang->gambar_barang) }}" alt="Gambar Barang" style="width: 350px; height: 350px; object-fit: cover;">

                    </td>
                </tr>
            </thead>
        </table>
        <br>    
        <a href="{{ route('barang.index') }}" class="btn btn-default">Kembali</a>
    </div>
@endsection