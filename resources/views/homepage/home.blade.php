@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="landing-wrapper d-flex justify-content-center align-items-center min-vh-50 bg-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left: Slogan & CTA -->
                <div class="col-md-6 mb-5 mb-md-0">
                    <div class="slogan-box p-4 rounded shadow-lg bg-primary text-white text-center text-md-start">
                        <h1 class="fw-bold display-4 mb-3">Kelola Air, Selamatkan Masa Depan</h1>
                        <p class="lead mb-4">
                            Anda berhak atas kemudahan, efisiensi, dan kontrol penuh atas penggunaan air di rumah.
                            Bersama <span class="fw-bold">My Water Track</span>, wujudkan gaya hidup hemat air yang
                            bertanggung jawab!
                        </p>
                        <a href="{{ route('register') }}"
                            class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold shadow animate__animated animate__pulse animate__infinite">
                            <i class="bi bi-droplet-half me-2 fs-4"></i>
                            Gabung Sekarang
                        </a>
                    </div>
                </div>
                <!-- Right: Logo -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('image/logo.png') }}" alt="Water Logo" class="img-fluid landing-logo"
                        style="max-width: 350px;">
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    </div>

    <!-- Additional Information Section -->
    <section class="features-section py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-4">
                <h2 class="mb-3">Fitur Unggulan</h2>
                <p class="text-muted">Nikmati berbagai fitur yang memudahkan Anda dalam mengelola penggunaan air di rumah.
                </p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-graph-up-arrow display-4 text-primary mb-3"></i>
                        <h4>Pantau Konsumsi</h4>
                        <p>Visualisasi data konsumsi air harian, mingguan, dan bulanan secara real-time.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-bell display-4 text-primary mb-3"></i>
                        <h4>Notifikasi Pengingat</h4>
                        <p>Dapatkan notifikasi saat penggunaan air melebihi batas yang Anda tetapkan.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-shield-check display-4 text-primary mb-3"></i>
                        <h4>Privasi & Keamanan</h4>
                        <p>Data Anda aman dan terlindungi dengan sistem keamanan terbaik.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-bar-chart-line display-4 text-primary mb-3"></i>
                        <h4>Riwayat Penggunaan</h4>
                        <p>Lihat riwayat penggunaan air Anda secara detail untuk setiap periode waktu.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-people display-4 text-primary mb-3"></i>
                        <h4>Multi Pengguna</h4>
                        <p>Kelola beberapa anggota keluarga dalam satu akun untuk pemantauan bersama.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box p-4 shadow-sm h-100">
                        <i class="bi bi-lightbulb display-4 text-primary mb-3"></i>
                        <h4>Tips Hemat Air</h4>
                        <p>Dapatkan tips dan edukasi seputar penghematan air yang mudah diterapkan sehari-hari.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Informational Section -->
    <section class="info-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('image/water-saving.png') }}" alt="Water Saving" class="img-fluid rounded shadow">
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3">Mengapa Menghemat Air Itu Penting?</h3>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle text-success me-2"></i> Membantu menjaga ketersediaan air bersih
                            untuk masa depan.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Mengurangi biaya tagihan air bulanan Anda.
                        </li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Berkontribusi dalam pelestarian lingkungan
                            dan ekosistem.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Membentuk kebiasaan hidup hemat dan
                            bertanggung jawab.</li>
                    </ul>
                    <p class="mt-3 text-muted">
                        Dengan My Water Track, Anda dapat memulai perubahan kecil yang berdampak besar bagi keluarga dan
                        lingkungan sekitar.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection