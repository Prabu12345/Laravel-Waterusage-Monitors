<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Tagihan Penggunaan</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Tagihan Penggunaan Meter</h1>
    <p>Tanggal Laporan: {{ date('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>ID Tagihan</th>
                <th>ID Pengguna</th>
                <th>Pemakaian (kWh)</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            @forelse($billings as $billing)
                <tr>
                    <td>{{ $billing->id }}</td>
                    <td>{{ $billing->user_id }}</td>
                    <td>{{ $billing->meter_usage }}</td>
                    <td>{{ \Carbon\Carbon::parse($billing->start_date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($billing->end_date)->format('d M Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data tagihan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>