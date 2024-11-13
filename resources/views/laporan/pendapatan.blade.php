@extends('layouts.master')

@section('title', 'Laporan Pendapatan')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan Pendapatan</li>
@endsection

@section('content')
    <div>
        <a href="{{ route('laporan.exportPDF') }}" class="btn btn-primary mb-3">Unduh PDF</a>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                            <td>Rp{{ number_format($transaksi->total_pendapatan, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Total Pendapatan Bulan Ini</th>
                        <th>Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
