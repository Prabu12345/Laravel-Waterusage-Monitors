@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4 fw-bold">Tambah Data Penggunaan Air</h1>

        <!-- Tips Section -->
        <div class="alert alert-info d-flex align-items-start mb-4" role="alert">
            <img src="{{ asset('image/Meteran.png') }}" alt="Contoh Meteran Air" style="width:280px; height:auto;"
                class="me-3 border rounded shadow-sm bg-white p-1">
            <div>
                <strong>Tips Pengisian:</strong>
                <ul class="mb-1">
                    <li>Pastikan Anda membaca angka meter air dari kiri ke kanan.</li>
                    <li>Masukkan hanya angka hitam (angka bulat) yang tertera pada meteran air Anda.</li>
                    <li>Abaikan angka berwarna merah atau angka di belakang koma (desimal).</li>
                    <li>Pastikan foto atau catatan angka meteran diambil dengan jelas untuk menghindari kesalahan input.
                    </li>
                    <li>Contoh: Jika pada meteran tertulis <strong>12345</strong> (angka hitam) dan <span
                            class="text-danger">678</span> (angka merah), maka yang diinput adalah <strong>12345</strong>.
                    </li>
                </ul>
                <strong>Langkah-langkah Pengisian:</strong>
                <ol class="mb-1">
                    <li>Periksa meteran air di rumah Anda dan catat angka hitam yang tertera.</li>
                    <li>Buka form ini dan masukkan angka tersebut pada kolom <strong>Meter Usage</strong>.</li>
                    <li>Pilih tanggal mulai (<strong>Start Date</strong>) dan tanggal akhir (<strong>End Date</strong>)
                        periode pencatatan.</li>
                    <li>Pastikan semua data sudah benar, lalu klik tombol <strong>Tambahkan</strong>.</li>
                </ol>
                <small class="text-muted">Lihat gambar di samping sebagai contoh pembacaan angka meter air yang
                    benar.</small>
            </div>
        </div>

        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <strong>Catatan & Kalkulator Manual Pemakaian Air:</strong>
                <p class="mb-2">
                    Untuk mengetahui pemakaian air bulan ini, kurangi angka meter terbaru dengan angka meter bulan
                    sebelumnya.
                </p>
                <form id="water-usage-calculator" class="row g-2 align-items-end">
                    <div class="col-md-4">
                        <label for="prev_meter" class="form-label mb-1">Meter Bulan Lalu</label>
                        <input type="number" class="form-control" id="prev_meter" placeholder="Contoh: 12345" min="0"
                            max="99999" oninput="if(this.value.length>5)this.value=this.value.slice(0,5);">
                    </div>
                    <div class="col-md-4">
                        <label for="curr_meter" class="form-label mb-1">Meter Sekarang</label>
                        <input type="number" class="form-control" id="curr_meter" placeholder="Contoh: 12500" min="0"
                            max="99999" oninput="if(this.value.length>5)this.value=this.value.slice(0,5);">
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-primary w-100" onclick="calculateUsage()">Hitung
                            Pemakaian</button>
                    </div>
                </form>
                <div id="usage_result" class="mt-3 fw-semibold"></div>
                <small class="text-muted d-block mt-2">
                    Contoh: Jika meter bulan lalu <strong>12345</strong> dan meter sekarang <strong>12500</strong>, maka
                    pemakaian bulan ini adalah <strong>12500 - 12345 = 155 m³</strong>.
                </small>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form method="POST" action="{{ route('waterusage.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="meter_usage" class="form-label fw-semibold">Meter Usage</label>
                        <input type="number" step="1" min="0" max="99999" maxlength="5" class="form-control form-control-lg"
                            id="meter_usage" name="meter_usage" placeholder="Contoh: 12345" required
                            oninput="if(this.value.length>5)this.value=this.value.slice(0,5);">
                        <div class="form-text">Masukkan angka hitam pada meter air Anda.</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label fw-semibold">Start Date</label>
                            <input type="date" class="form-control form-control-lg" id="start_date" name="start_date"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="end_date" class="form-label fw-semibold">End Date</label>
                            <input type="date" class="form-control form-control-lg" id="end_date" name="end_date" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculateUsage() {
            const prev = parseInt(document.getElementById('prev_meter').value, 10);
            const curr = parseInt(document.getElementById('curr_meter').value, 10);
            const resultDiv = document.getElementById('usage_result');
            if (isNaN(prev) || isNaN(curr)) {
                resultDiv.innerHTML = '<span class="text-danger">Mohon isi kedua angka meter terlebih dahulu.</span>';
            } else if (curr < prev) {
                resultDiv.innerHTML = '<span class="text-danger">Meter sekarang tidak boleh lebih kecil dari meter bulan lalu.</span>';
            } else {
                const usage = curr - prev;
                resultDiv.innerHTML = `Pemakaian air bulan ini: <span class="text-primary">${usage} m³</span>`;
            }
        }
    </script>
@endsection