@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div class="landing-wrapper d-flex justify-content-center align-items-center">
        <div class="text-center">
            <img src="{{ asset('image/logo.png') }}" alt="Water Logo" class="landing-icon mb-3">
            <h1 class="landing-title">MY WATER TRACK</h1>

            <div class="description-box mx-auto mb-3">
                <p class="landing-subtitle">
                    My Water Track adalah solusi cerdas bagi Anda yang ingin mengelola penggunaan air rumah tangga secara efisien, hemat, dan bertanggung jawab.
                    Dengan tampilan yang simpel namun informatif, Anda dapat memantau konsumsi air harian, mingguan, hingga bulanan langsung dari genggaman tangan.
                    Tak hanya membantu menghemat pengeluaran, Anda juga turut berperan dalam menjaga lingkungan.

                    Bergabunglah sekarang dan mulai langkah kecil untuk perubahan besar—hemat air, selamatkan masa depan!
                </p>
            </div>

            <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">
                <i class="bi bi-droplet-half me-2"></i> Gabung Sekarang
            </a>
        </div>
    </div>
@endsection
