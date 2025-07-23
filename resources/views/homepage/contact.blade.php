@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-4">
                    <h1 class="fw-bold text-primary">Hubungi Kami</h1>
                    <p class="text-muted">Kami siap membantu Anda. Silakan isi form di bawah ini untuk menghubungi kami.</p>
                </div>
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <form action="{{ route('homepage.sendContact') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="name" name="name"
                                    placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input type="email" class="form-control form-control-lg rounded-3" id="email" name="email"
                                    placeholder="nama@email.com" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label fw-semibold">No Telepon</label>
                                <input type="tel" class="form-control form-control-lg rounded-3" id="phone" name="phone"
                                    placeholder="08xxxxxxxxxx" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label fw-semibold">Pesan</label>
                                <textarea class="form-control form-control-lg rounded-3" id="message" name="message"
                                    rows="4" placeholder="Tulis pesan Anda di sini" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 shadow-sm">Kirim
                                Pesan</button>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-4 text-muted small contact-info">
                    <i class="bi bi-telephone me-2"></i>+62 812-3456-7890 &nbsp; | &nbsp;
                    <i class="bi bi-envelope me-2"></i>info@email.com
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            background: #fff;
        }

        .form-label {
            font-weight: 600;
            color: #2575fc;
        }

        .form-control:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 0.15rem rgba(33, 150, 243, 0.15);
        }

        .btn-primary {
            background: linear-gradient(90deg, #36b2ff 0%, #32b7ff 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: background 0.2s;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2196f3 0%, #2575fc 100%);
        }

        .contact-info {
            margin-top: 2rem;
            color: #6c757d;
            font-size: 1rem;
        }
    </style>
@endsection