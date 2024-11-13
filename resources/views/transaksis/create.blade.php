@extends('layouts.master')

@section('title', 'Tambah Transaksi')

@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Tambah Transaksi</li>
@endsection

@section('content')
<form action="{{ route('transaksis.store') }}" method="POST">
    @csrf
    @if ($errors->has('stok'))
    <div class="alert alert-danger">
        {{ $errors->first('stok') }}
    </div>
@endif

<!-- Menampilkan pesan error jika uang diterima tidak cukup -->
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

    <div>
        <label>Barang</label>
        <select name="barang_id" id="barang_id" class="form-control">
            @foreach ($barangs as $barang)
                <option value="{{ $barang->id }}" data-harga="{{ $barang->harga_barang }}">{{ $barang->nama_barang }} - Rp{{ number_format($barang->harga_barang, 0, ',', '.') }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Jumlah</label>
        <input type="number" name="jumlah" id="jumlah" value="1" min="1" class="form-control" placeholder="0">
    </div>
    <div>
        <label>Pembayaran</label>
        <select name="pembayaran_id" id="pembayaran_id" required class="form-control">
            @foreach ($pembayarans as $pembayaran)
                <option value="{{ $pembayaran->id }}">{{ $pembayaran->jenis_pembayaran }}</option>
            @endforeach
        </select>
    </div>
    
    <div>
        <label>Uang Diterima</label>
        <input type="number" name="uang_diterima" id="uang_diterima" class="form-control" placeholder="0">
    </div>
    <div>
        <label>Kembalian</label>
        <input type="text" id="kembalian" readonly class="form-control" placeholder="0">
    </div>
    <div>
        <label>Total Harga</label>
        <input type="text" id="total_harga" readonly class="form-control" placeholder="0">  
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('transaksis.index') }}" class="btn btn-default">Batal</a>
</form>

<script>
document.getElementById('jumlah').addEventListener('input', calculateTotal);
document.getElementById('barang_id').addEventListener('change', calculateTotal);
document.getElementById('uang_diterima').addEventListener('input', calculateChange);

function calculateTotal() {
    const harga = parseFloat(document.querySelector('#barang_id option:checked').dataset.harga);
    const jumlah = parseInt(document.getElementById('jumlah').value);
    const totalHarga = harga * jumlah;
    document.getElementById('total_harga').value = totalHarga.toLocaleString();
}

function calculateChange() {
        const totalHarga = parseFloat(document.getElementById('total_harga').value.replace(/[^0-9,-]+/g, '')) || 0;
        const uangDiterima = parseFloat(document.getElementById('uang_diterima').value) || 0;
        const kembalian = uangDiterima - totalHarga;
    
        // Format kembalian sebagai Rupiah
        document.getElementById('kembalian').value = kembalian.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
    }

</script>

@endsection