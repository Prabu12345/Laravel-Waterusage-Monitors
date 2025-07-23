@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/biodata.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="card biodata-card">
            <div class="row g-0">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('image/foto1.jpg') }}" class="img-fluid rounded-start biodata-image mb-2" alt="Foto Profil">

                    <div class="social-links">
                        <a href="https://github.com/Rifal04" target="_blank" class="btn btn-dark">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://instagram.com/rifallfsdq_" target="_blank" class="btn btn-danger">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://wa.me/6281318055684" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://x.com/rifal62095" target="_blank" class="btn btn-dark text-white">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Biodata</h3>
                        <div class="biodata-grid">
                            <div class="biodata-box"><strong>Nama Asli:</strong><br>Rifal Fajar Sidiq</div>
                            <div class="biodata-box"><strong>Nama Panggung:</strong><br>Q'vayy</div>
                            <div class="biodata-box"><strong>Tempat Lahir:</strong><br>Subang</div>
                            <div class="biodata-box"><strong>Tanggal Lahir:</strong><br>4 Januari 2004</div>
                            <div class="biodata-box"><strong>Kewarganegaraan:</strong><br>Indonesia</div>
                            <div class="biodata-box"><strong>Jenis Kelamin:</strong><br>Laki-laki</div>
                            <div class="biodata-box"><strong>Agama:</strong><br>Islam</div>
                            <div class="biodata-box"><strong>Golongan Darah:</strong><br>B+</div>
                            <div class="biodata-box"><strong>Status:</strong><br>Belum Menikah</div>
                            <div class="biodata-box"><strong>Pekerjaan:</strong><br>Mahasiswa</div>
                            <div class="biodata-box"><strong>Hobi:</strong><br>Olahraga, Masak</div>
                            <div class="biodata-box"><strong>Bahasa:</strong><br>Indonesia, Sunda, Arab</div>
                            <div class="biodata-box"><strong>Email:</strong><br>rifalfajarsidiq04@gmail.com</div>
                            <div class="biodata-box"><strong>Nomor Telepon:</strong><br>+62 813-1805-5684</div>
                            <div class="biodata-box"><strong>Pendidikan Terakhir:</strong><br>SMK Negeri Kasomalang</div>
                            <div class="biodata-box"><strong>Alamat:</strong><br>Pasanggrahan Kec. Kasomalang Kab. Subang Prov. Jawa Barat</div>
                            <div class="biodata-box"><strong>Motto Hidup:</strong><br>"Manusia boleh berencana, tapi saldo yang menentukan"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
