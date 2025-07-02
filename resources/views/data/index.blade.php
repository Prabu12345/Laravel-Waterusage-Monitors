@extends('layouts.app')

@section('content')
    <h1>Kelola Data</h1>

    <div class="mb-3">
        <a href="{{ route('data.create') }}" class="btn btn-primary me-2">Tambah Data</a>
        <!-- <button class="btn btn-secondary">Download</button> -->
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Meter Usage</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->meter_usage }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('l, d F Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('l, d F Y') }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-warning">Edit Data</a>
                                <form action="" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete(this)">Hapus
                                        Data</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(form) {
            if (confirm('Yakin, data akan dihapus?')) {
                form.submit();
            }
        }
    </script>
@endsection