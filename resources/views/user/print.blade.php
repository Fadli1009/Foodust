<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .nota {
            border: 1px solid #000;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="nota">
        <div class="header">
            <h1>Nota Pembelian</h1>
            <p>Terima Kasih telah beli di toko LyraFood</p>
        </div>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
            @foreach ($datakeranjang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Nama }}</td>
                <td>{{ $item->Total }}</td>
                <td>Rp.{{ number_format($item->Harga, 0,'.',',') }}</td>
                <td>Rp.{{ number_format($item->Jumlah, 0,'.',',') }}</td>
            </tr>
            @endforeach
        </table>
        <div class="total">
            <p>Total Uang:Rp.{{ $rupiah }}</p>
            <p>Total Pembelian:Rp.{{ $rupiah }}</p>
            <p>Total Kembalian:Rp.{{ number_format($kembalian,0,'.',',') }}</p>
        </div>
        <footer>
            <p>Selamat Makan</p>
        </footer>
    </div>
</body>

</html>