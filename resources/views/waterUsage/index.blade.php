@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0 text-primary">Kelola Data Penggunaan Air</h2>
            <div class="btn-group">
                <a href="{{ route('waterusage.export.excel') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export Excel
                </a>
                <a href="{{ route('waterusage.export.pdf') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
                </a>
                <a href="{{ route('waterusage.create') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Data
                </a>
            </div>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('waterusage.index') }}" class="mb-3">
            <div class="row g-3 align-items-end bg-light rounded-4 p-4 shadow-sm mb-4">
                <div class="col-md-3">
                    <label for="start_date" class="form-label fw-semibold">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ request('start_date') }}"
                        class="form-control rounded-pill shadow-sm">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label fw-semibold">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ request('end_date') }}"
                        class="form-control rounded-pill shadow-sm">
                </div>
                <div class="col-md-2">
                    <label for="min_meter_usage" class="form-label fw-semibold">Min Meter Usage</label>
                    <input type="number" name="min_meter_usage" id="min_meter_usage"
                        value="{{ request('min_meter_usage') }}" class="form-control rounded-pill shadow-sm"
                        placeholder="Min">
                </div>
                <div class="col-md-2">
                    <label for="max_meter_usage" class="form-label fw-semibold">Max Meter Usage</label>
                    <input type="number" name="max_meter_usage" id="max_meter_usage"
                        value="{{ request('max_meter_usage') }}" class="form-control rounded-pill shadow-sm"
                        placeholder="Max">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 rounded-pill shadow-sm">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                </div>
            </div>
        </form>

        <div class="card shadow-lg border-0 rounded-4">
            <div
                class="card-header bg-white border-0 rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
                <span class="fw-semibold fs-5 text-white"><i class="bi bi-droplet-half me-2"></i>Daftar
                    Penggunaan
                    Air</span>
                <span class="badge bg-primary bg-gradient text-white fs-6">{{ $items->count() }} Data</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center" style="width: 5%;">No</th>
                                <th scope="col">Meter Usage</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col" class="text-center" style="width: 18%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td class="text-center fw-bold text-secondary">
                                        {{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-primary">
                                            <i class="bi bi-speedometer2 me-1"></i>
                                            {{ $item->meter_usage }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info bg-gradient text-gradient px-3 py-2 fs-6 shadow-sm">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-gradient px-3 py-2 fs-6 shadow-sm">
                                            <i class="bi bi-calendar-check me-1"></i>
                                            {{ \Carbon\Carbon::parse($item->end_date)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('waterusage.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning me-1 rounded-pill px-3 shadow-sm">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ route('waterusage.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger rounded-pill px-3 shadow-sm"
                                                onclick="confirmDelete(this)">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-5 fs-5">
                                        <i class="bi bi-inbox me-2 fs-3"></i>Belum ada data penggunaan air.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-3">
                    {{ $items->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons CDN (if not already included) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script>
        function confirmDelete(button) {
            if (confirm('Yakin, data akan dihapus?')) {
                button.closest('form').submit();
            }
        }
    </script>
@endsection