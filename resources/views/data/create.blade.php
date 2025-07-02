@extends('layouts.app')

@section('content')
    <h1>Tambah Data</h1>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('data.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="meter_usage" class="form-label">Meter Usage</label>
                    <input type="number" step="0.01" class="form-control" id="meter_usage" name="meter_usage" required>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
@endsection