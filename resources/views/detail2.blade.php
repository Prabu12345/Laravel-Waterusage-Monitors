@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/biodata.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="card biodata-card">
            <div class="row g-0">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('image/yoseph.jpg') }}" class="img-fluid rounded-start biodata-image mb-2" alt="Foto Profil">

                    <div class="social-links">
                        <a href="https://github.com/MIqbalNurjaman" target="_blank" class="btn btn-dark">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="https://www.instagram.com/iqball__o?igsh=MWtjdGMwczI0bWg1cw==" target="_blank" class="btn btn-danger">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://wa.me/6283104383321" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="https://x.com/iqbalnurjaman23" target="_blank" class="btn btn-dark text-white">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title mb-3">Biodata</h3>
                        <div class="biodata-grid">
                            <div class="biodata-box"><strong>Nama Asli:</strong><br>M. Iqbal Nurjaman</div>
                            <div class="biodata-box"><strong>Nama Panggung:</strong><br>yoseph</div>
                            <div class="biodata-box"><strong>Tempat Lahir:</strong><br>Bandung</div>
                            <div class="biodata-box"><strong>Tanggal Lahir:</strong><br>23 Oktober 2003</div>
                            <div class="biodata-box"><strong>Kewarganegaraan:</strong><br>Indonesia</div>
                            <div class="biodata-box"><strong>Jenis Kelamin:</strong><br>Laki-Laki</div>
                            <div class="biodata-box"><strong>Agama:</strong><br>Islam</div>
                            <div class="biodata-box"><strong>Golongan Darah:</strong><br><Obj>-</Obj></div>
                            <div class="biodata-box"><strong>Status:</strong><br>Belum Menikah</div>
                            <div class="biodata-box"><strong>Pekerjaan:</strong><br>Mahasiswa</div>
                            <div class="biodata-box"><strong>Hobi:</strong><br>Bermain bola, membaca al-qur'an</div>
                            <div class="biodata-box"><strong>Bahasa:</strong><br>Indonesia</div>
                            <div class="biodata-box"><strong>Email:</strong><br>sitiblackpink298@gmail.com</div>
                            <div class="biodata-box"><strong>Nomor Telepon:</strong><br>+62 83-104-383-321</div>
                            <div class="biodata-box"><strong>Pendidikan Terakhir:</strong><br>SMKN 1 Cipeundeuy KBB</div>
                            <div class="biodata-box"><strong>Alamat:</strong><br>Babakan Tapos no.42 Desa. Sirnaraja Kec. Cipeundeuy Kab. Bandung Barat Prov. Jawa Barat</div>
                            <div class="biodata-box"><strong>Motto Hidup:</strong><br>"hidup only"</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
