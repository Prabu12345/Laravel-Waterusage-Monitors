@extends('layouts.app')


@section('content')
    @php
        $categories = [
            'Kamar Mandi' => [
                [
                    'icon' => 'bi-shower',
                    'title' => 'Mandi Lebih Singkat',
                    'desc' => 'Batasi waktu mandi 5-7 menit. Setiap menit yang Anda hemat dapat mengurangi puluhan liter air terbuang.'
                ],
                [
                    'icon' => 'bi-droplet',
                    'title' => 'Matikan Keran Saat Tidak Digunakan',
                    'desc' => 'Biasakan mematikan keran saat menggosok gigi, mencuci muka, mencukur, atau memakai sabun. Ini kebiasaan emas untuk menghemat air.'
                ],
                [
                    'icon' => 'bi-droplet-half',
                    'title' => 'Gunakan Shower Hemat Air',
                    'desc' => 'Pasang kepala shower hemat air (low-flow showerhead) untuk mengurangi konsumsi air tanpa mengurangi tekanan.'
                ],
                [
                    'icon' => 'bi-bucket',
                    'title' => 'Tampung Air Dingin',
                    'desc' => 'Saat menunggu air panas, tampung air dingin pertama dengan ember untuk menyiram tanaman atau membersihkan lantai.'
                ],
            ],
            'Toilet' => [
                [
                    'icon' => 'bi-trash',
                    'title' => 'Jangan Jadikan Toilet Tempat Sampah',
                    'desc' => 'Hindari membuang tisu, rambut, atau sampah ke toilet agar tidak perlu menyiram berulang kali.'
                ],
                [
                    'icon' => 'bi-arrow-repeat',
                    'title' => 'Gunakan Toilet Dual-Flush',
                    'desc' => 'Pilih toilet dual-flush agar bisa memilih siraman kecil atau besar sesuai kebutuhan, sehingga lebih hemat air.'
                ],
                [
                    'icon' => 'bi-exclamation-triangle',
                    'title' => 'Periksa Kebocoran Toilet',
                    'desc' => 'Cek kebocoran dengan meneteskan pewarna makanan ke tangki toilet. Jika warna muncul di mangkuk tanpa disiram, segera perbaiki.'
                ],
            ],
            'Dapur' => [
                [
                    'icon' => 'bi-cup-straw',
                    'title' => 'Cuci Piring dengan Cerdas',
                    'desc' => 'Gunakan metode dua baskom: satu untuk mencuci dengan sabun, satu untuk membilas. Jangan mencuci di bawah air mengalir.'
                ],
                [
                    'icon' => 'bi-gear',
                    'title' => 'Gunakan Mesin Cuci Piring dengan Efisien',
                    'desc' => 'Jalankan mesin cuci piring hanya saat penuh. Mesin modern biasanya lebih hemat air daripada mencuci manual.'
                ],
                [
                    'icon' => 'bi-arrow-repeat',
                    'title' => 'Gunakan Kembali Air Bekas',
                    'desc' => 'Air bekas mencuci sayur/buah bisa digunakan untuk menyiram tanaman atau membersihkan halaman.'
                ],
                [
                    'icon' => 'bi-bucket',
                    'title' => 'Tampung Air Saat Mencuci Bahan Makanan',
                    'desc' => 'Gunakan baskom untuk mencuci sayur dan buah, bukan di bawah air mengalir.'
                ],
                [
                    'icon' => 'bi-snow',
                    'title' => 'Simpan Air Minum di Kulkas',
                    'desc' => 'Simpan air minum di kulkas agar tidak perlu membiarkan keran mengalir untuk mendapatkan air dingin.'
                ],
                [
                    'icon' => 'bi-cup-hot',
                    'title' => 'Gunakan Air Secukupnya Saat Memasak',
                    'desc' => 'Gunakan air secukupnya saat merebus atau memasak, tidak perlu mengisi panci sampai penuh.'
                ],
            ],
            'Laundry' => [
                [
                    'icon' => 'bi-basket',
                    'title' => 'Cuci Baju dengan Muatan Penuh',
                    'desc' => 'Jalankan mesin cuci hanya saat penuh agar lebih hemat air dan listrik.'
                ],
                [
                    'icon' => 'bi-droplet-half',
                    'title' => 'Pilih Mesin Cuci Hemat Air',
                    'desc' => 'Pilih mesin cuci bukaan depan (front-loading) yang lebih hemat air dan energi.'
                ],
                [
                    'icon' => 'bi-bucket',
                    'title' => 'Manfaatkan Air Bilasan Terakhir',
                    'desc' => 'Air bilasan terakhir dari cucian bisa digunakan untuk mengepel lantai atau membersihkan garasi.'
                ],
            ],
            'Taman & Luar Ruangan' => [
                [
                    'icon' => 'bi-sunrise',
                    'title' => 'Siram Tanaman pada Waktu yang Tepat',
                    'desc' => 'Siram tanaman di pagi atau sore hari agar air tidak cepat menguap dan lebih banyak diserap akar.'
                ],
                [
                    'icon' => 'bi-flower2',
                    'title' => 'Fokus pada Akar Tanaman',
                    'desc' => 'Siram air langsung ke akar, bukan ke daun, agar air terserap optimal.'
                ],
                [
                    'icon' => 'bi-droplet',
                    'title' => 'Gunakan Penyiram yang Tepat',
                    'desc' => 'Gunakan gembor atau selang dengan semprotan yang bisa diatur agar air lebih efisien.'
                ],
                [
                    'icon' => 'bi-bucket',
                    'title' => 'Cuci Mobil dengan Ember',
                    'desc' => 'Gunakan ember, bukan selang yang mengalir terus-menerus, untuk mencuci mobil.'
                ],
                [
                    'icon' => 'bi-cloud-rain',
                    'title' => 'Manfaatkan Air Hujan',
                    'desc' => 'Tampung air hujan untuk menyiram tanaman atau membersihkan halaman.'
                ],
            ],
            'Umum' => [
                [
                    'icon' => 'bi-tools',
                    'title' => 'Segera Perbaiki Kebocoran',
                    'desc' => 'Periksa dan perbaiki semua keran, pipa, dan selang yang bocor. Satu tetesan kecil bisa membuang ribuan liter air per tahun.'
                ],
                [
                    'icon' => 'bi-funnel',
                    'title' => 'Pasang Aerator pada Keran',
                    'desc' => 'Aerator di ujung keran mencampur udara ke aliran air, mengurangi volume air tanpa mengurangi tekanan.'
                ],
                [
                    'icon' => 'bi-people',
                    'title' => 'Edukasi Keluarga',
                    'desc' => 'Ajak seluruh anggota keluarga untuk aktif menghemat air. Kebiasaan bersama lebih efektif.'
                ],
                [
                    'icon' => 'bi-lightbulb',
                    'title' => 'Ubah Pola Pikir',
                    'desc' => 'Ingat, air bersih adalah sumber daya terbatas. Setiap tetes yang dihemat sangat berarti.'
                ],
            ],
        ];
    @endphp

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0 text-primary" style="letter-spacing:1px;">
                <i class="bi bi-droplet-half me-2 text-primary"></i>Tips Penggunaan & Penghematan Air
            </h2>
        </div>

        <ul class="nav nav-pills mb-4 gap-2 flex-wrap" id="tipsTab" role="tablist">
            @foreach($categories as $cat => $tips)
                <li class="nav-item" role="presentation">
                    <button class="nav-link @if($loop->first) active @endif" id="tab-{{ Str::slug($cat) }}"
                        data-bs-toggle="pill" data-bs-target="#pane-{{ Str::slug($cat) }}" type="button" role="tab"
                        aria-controls="pane-{{ Str::slug($cat) }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        <i class="bi bi-{{ $loop->index % 2 == 0 ? 'droplet' : 'water' }} me-1"></i>{{ $cat }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" id="tipsTabContent">
            @foreach($categories as $cat => $tips)
                <div class="tab-pane fade @if($loop->first) show active @endif" id="pane-{{ Str::slug($cat) }}" role="tabpanel"
                    aria-labelledby="tab-{{ Str::slug($cat) }}">
                    <div class="row g-4">
                        @foreach($tips as $tip)
                            <div class="col-md-6 col-lg-4">
                                <div
                                    class="card tip-card-modern h-100 border-0 shadow-sm d-flex flex-column align-items-center justify-content-center">
                                    <div class="tip-icon-modern d-flex align-items-center justify-content-center mb-3">
                                        <i class="bi {{ $tip['icon'] }} text-primary" style="font-size:2.5rem;"></i>
                                    </div>
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title fw-semibold mb-2 text-primary">{{ $tip['title'] }}</h5>
                                        <p class="card-text flex-grow-1">{{ $tip['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-5">
            <div class="alert alert-info rounded-4 shadow-sm px-4 py-3" style="font-size:1.08rem;">
                <strong>
                    <i class="bi bi-info-circle-fill me-2"></i>
                    Mulailah dari tips yang paling mudah Anda lakukan hari ini, dan secara bertahap jadikan ini sebagai
                    bagian dari gaya hidup Anda. Setiap tetes air yang dihemat sangat berarti. Semoga berhasil!
                </strong>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection