@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/biodata.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="card biodata-card">
            <div class="row g-0">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('image/foto3.jpg') }}" class="img-fluid rounded-start biodata-image mb-2" alt="Foto Profil">

                    <div class="social-links">
                        <a href="https://github.com/Prabu12345" target="_blank" class="btn btn-dark">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://instagram.com/prabu.deh" target="_blank" class="btn btn-danger">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://wa.me/628978546455" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Biodata</h3>
                        <div class="biodata-box"><strong>Nama Asli:</strong><br>M. Prabu Kiandamar Utoyo</div>
                            <div class="biodata-box"><strong>Nama Panggung:</strong><br>Prabu</div>
                            <div class="biodata-box"><strong>Tempat Lahir:</strong><br>Jakarta</div>
                            <div class="biodata-box"><strong>Tanggal Lahir:</strong><br>28 Mei 2004</div>
                            <div class="biodata-box"><strong>Kewarganegaraan:</strong><br>Indonesia</div>
                            <div class="biodata-box"><strong>Jenis Kelamin:</strong><br>Pria</div>
                            <div class="biodata-box"><strong>Agama:</strong><br>Islam</div>
                            <div class="biodata-box"><strong>Golongan Darah:</strong><br><Obj>-</Obj></div>
                            <div class="biodata-box"><strong>Status:</strong><br>Belum Menikah</div>
                            <div class="biodata-box"><strong>Pekerjaan:</strong><br>Mahasiswa</div>
                            <div class="biodata-box"><strong>Hobi:</strong><br>Menggambar, Membaca</div>
                            <div class="biodata-box"><strong>Bahasa:</strong><br>Indonesia, Inggris, Jepang</div>
                            <div class="biodata-box"><strong>Email:</strong><br>prabu.280504@gmail.com</div>
                            <div class="biodata-box"><strong>Nomor Telepon:</strong><br>+62 897-8546-455</div>
                            <div class="biodata-box"><strong>Pendidikan Terakhir:</strong><br>SMK Sederajat</div>
                            <div class="biodata-box"><strong>Alamat:</strong><br>Jl. Rawa Binangun II No.1, RT/RW 005/008, Koja, Jakarta Utara, DKI Jakarta</div>
                            <div class="biodata-box"><strong>Motto Hidup:</strong><br>"Berani Mencoba hal baru"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
