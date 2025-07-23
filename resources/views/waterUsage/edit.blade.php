@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2 class="fw-bold mb-4 text-primary">Edit Data Penggunaan Air</h2>
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('waterusage.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="meter_usage" class="form-label fw-semibold">Meter Usage</label>
                            <input type="number" step="0.01" class="form-control rounded-pill shadow-sm" id="meter_usage"
                                name="meter_usage" value="{{ old('meter_usage', $item->meter_usage) }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="start_date" class="form-label fw-semibold">Start Date</label>
                            <input type="date" class="form-control rounded-pill shadow-sm" id="start_date" name="start_date"
                                value="{{ old('start_date', \Carbon\Carbon::parse($item->start_date)->format('Y-m-d')) }}"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date" class="form-label fw-semibold">End Date</label>
                            <input type="date" class="form-control rounded-pill shadow-sm" id="end_date" name="end_date"
                                value="{{ old('end_date', \Carbon\Carbon::parse($item->end_date)->format('Y-m-d')) }}"
                                required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm fw-bold">
                            <i class="bi bi-save me-2"></i>Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection