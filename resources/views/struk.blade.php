<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            max-width: 400px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .detail, .total, .kembalian, .footer {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>Struk Pembelian</h3>
        <p>Terima Kasih telah berbelanja</p>
    </div>
    <div class="detail">
        <span><strong>Barang:</strong></span>
        <span>{{ $transaksi->barang->nama_barang }}</span>
    </div>
    <div class="detail">
        <span><strong>Jumlah:</strong></span>
        <span>{{ $transaksi->jumlah }}</span>
    </div>
    <div class="detail">
        <span><strong>Harga Barang:</strong></span>
        <span>Rp{{ number_format($transaksi->barang->harga_barang, 0, ',', '.') }}</span>
    </div>
    <div class="detail">
        <span><strong>Total Harga:</strong></span>
        <span>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
    </div>
    <div class="detail">
        <span><strong>Uang Diterima:</strong></span>
        <span>Rp{{ number_format($transaksi->uang_diterima, 0, ',', '.') }}</span>
    </div>
    <div class="total">
        <span><strong>Total:</strong></span>
        <span>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
    </div>
    <div class="kembalian">
        <span><strong>Kembalian:</strong></span>
        <span>Rp{{ number_format($transaksi->kembalian, 0, ',', '.') }}</span>
    </div>
    <div class="footer">
        <p>Alamat Toko: Jl. Kawali No. 99</p>
        <p>Telp: 0812-3456-7890</p>
        <p>&copy; {{ date('Y') }} Toko Baju Sejahtera</p>
    </div>
</body>
</html>
