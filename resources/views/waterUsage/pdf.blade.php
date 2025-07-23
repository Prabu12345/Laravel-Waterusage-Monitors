<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Tagihan Penggunaan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            background-color: #f7fafc;
            color: #4a5568;
            margin: 0;
            padding: 20px;
        }

        .report-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            color: #2d3748;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }

        .report-date {
            font-size: 14px;
            color: #718096;
            margin-top: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        thead th {
            background-color: #edf2f7;
            color: #6b83fb;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .empty-row td {
            text-align: center;
            padding: 40px;
            color: #a0aec0;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <div class="report-header">
            <img src="{{ public_path('image/logo.png') }}" alt="Water Logo" class="logo">

            <h1>Laporan Tagihan Penggunaan Meter</h1>
            <p class="report-date">Tanggal Laporan: {{ date('d F Y') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Tagihan</th>
                    <th>Pemakaian (kWh)</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $billing)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $billing->id }}</td>
                        <td>{{ $billing->meter_usage }}</td>
                        <td>{{ \Carbon\Carbon::parse($billing->start_date)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($billing->end_date)->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="5">Tidak ada data tagihan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>