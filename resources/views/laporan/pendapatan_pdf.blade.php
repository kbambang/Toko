<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendapatan Bulan Ini</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Laporan Pendapatan Bulanan</h1>
    <p><strong>Bulan:</strong> {{ \Carbon\Carbon::now()->format('F Y') }}</p>

    <table>
        <thead>
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
                <td class="total">Total Pendapatan Bulan Ini</td>
                <td class="total">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

</body>
</html>
