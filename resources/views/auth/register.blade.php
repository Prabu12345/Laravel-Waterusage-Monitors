<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="main-container">
        <div class="left-panel">
            <div class="register-card">
                <div class="mb-3 text-start">
                    <a href="{{ url('/') }}" class="btn btn-link p-0" style="text-decoration: none;">
                        <i class="bi bi-arrow-left"></i> {{ __('Back to Home') }}
                    </a>
                </div>
                <div class="card-header text-center">{{ __('REGISTER') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary" style="border-radius: 8px;">
                                {{ __('Register') }}
                            </button>
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Already have an account?') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right-panel">
            <div class="welcome">Welcome!</div>
            <div class="desc">
                Join our community and enjoy exclusive features.<br>
                Fast, secure, and easy registration.<br>
                <br>
                <i class="bi bi-people" style="font-size: 2.5rem;"></i>
            </div>
        </div>
    </div>
</body>

</html>