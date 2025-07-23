@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-body p-5">
                        <h1 class="text-center fw-bold mb-4 text-primary">Tentang Kami</h1>
                        <h4 class="text-center mb-3 text-secondary">Website Project UAS Pemrograman Web 2</h4>
                        <p class="card-text text-center mb-4 fs-5">
                            Website ini dibuat sebagai bagian dari tugas akhir mata kuliah Pemrograman Web 2. Kami
                            berkomitmen menghadirkan platform informatif, responsif, dan mudah digunakan untuk mendukung
                            pembelajaran serta pengembangan keterampilan web.
                        </p>
                        <div class="row text-center mb-4">
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="bg-light rounded-3 p-3 h-100 shadow-sm">
                                    <i class="bi bi-gear-fill fs-2 text-primary mb-2"></i>
                                    <h6 class="fw-bold">Fitur Utama</h6>
                                    <small>Pengelolaan data, mobile-friendly, navigasi intuitif</small>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3 mb-md-0">
                                <div class="bg-light rounded-3 p-3 h-100 shadow-sm">
                                    <i class="bi bi-code-slash fs-2 text-success mb-2"></i>
                                    <h6 class="fw-bold">Teknologi</h6>
                                    <small>Laravel, Bootstrap, MySQL</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="bg-light rounded-3 p-3 h-100 shadow-sm">
                                    <i class="bi bi-lightbulb-fill fs-2 text-warning mb-2"></i>
                                    <h6 class="fw-bold">Visi</h6>
                                    <small>Pembelajaran & pengembangan web praktis</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="text-center mb-4 text-primary">Tim Pengembang</h4>
                        <div class="table-responsive">
                            <table class="table align-middle table-hover rounded-3 overflow-hidden">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th class="fw-semibold">Nama</th>
                                        <th class="fw-semibold">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td class="fw-medium">M Prabu Kiandamar Utoyo</td>
                                        <td>
                                            <a href="{{ route('homepage.detail1') }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">M Iqbal Nurjaman</td>
                                        <td>
                                            <a href="{{ route('homepage.detail2') }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Ulfah Nuraeni</td>
                                        <td>
                                            <a href="{{ route('homepage.detail3') }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Rifal Fajar Sidiq</td>
                                        <td>
                                            <a href="{{ route('homepage.detail4') }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Detail</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4">
                            <span class="text-muted small">© {{ date('Y') }} Project UAS Pemrograman Web 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection