@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-center"
        style="min-height: 90vh; background: linear-gradient(135deg, #e0e7ff 0%, #f8fafc 100%);">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-5 overflow-hidden">
                <div class="card-header bg-gradient text-white text-center"
                    style="background: linear-gradient(90deg, #6366f1 0%, #3b82f6 100%);">
                    <h2 class="mb-0 fw-bold"><i class="bi bi-shield-lock-fill me-2"></i>{{ __('Reset Password') }}</h2>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope-at"></i></span>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                    placeholder="you@example.com">
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password" placeholder="New password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm"
                                class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm password">
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-gradient btn-lg rounded-pill shadow-sm fw-bold"
                                style="background: linear-gradient(90deg, #6366f1 0%, #3b82f6 100%); border: none;">
                                <i class="bi bi-arrow-repeat me-2"></i>{{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons CDN for the button/icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .btn-gradient {
            color: #fff;
            transition: background 0.3s, box-shadow 0.3s;
        }

        .btn-gradient:hover,
        .btn-gradient:focus {
            background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%);
            box-shadow: 0 4px 24px rgba(59, 130, 246, 0.2);
            color: #fff;
        }

        .card {
            border-radius: 2rem !important;
        }

        .card-header {
            border-radius: 2rem 2rem 0 0 !important;
        }

        .input-group-text {
            border-radius: 1rem 0 0 1rem !important;
        }

        .form-control {
            border-radius: 0 1rem 1rem 0 !important;
        }
    </style>
@endsection
@endsection