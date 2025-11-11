<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Laravel Application</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template_lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template_lte/dist/css/adminlte.min.css') }}">

    <style>
        .login-page {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 400px;
            margin: 0 auto;
        }

        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            border: none;
            overflow: hidden;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-logo-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px 20px;
            text-align: center;
        }

        .login-logo-box img {
            max-width: 120px;
            height: auto;
            filter: brightness(0) invert(1);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .login-logo-box h1 {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .login-logo-box p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin: 0;
        }

        .login-card-body {
            padding: 40px 30px 30px;
            background: #fff;
        }

        .login-card-body h3 {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            text-align: center;
        }

        .login-card-body p {
            color: #666;
            font-size: 14px;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .input-group .form-control {
            border-right: none;
            padding: 12px 15px;
            font-size: 14px;
        }

        .input-group .form-control:focus {
            border-color: #667eea;
            box-shadow: none;
        }

        .input-group-text {
            background: transparent;
            border-left: none;
            color: #667eea;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: #fff;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .login-footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }

        .login-footer p {
            margin: 5px 0;
            color: #666;
            font-size: 13px;
        }

        .login-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
            animation: slideDown 0.3s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
        }

        .demo-credentials {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
            border-left: 4px solid #667eea;
        }

        .demo-credentials strong {
            color: #667eea;
            display: block;
            margin-bottom: 10px;
        }

        .demo-credentials .credential-item {
            background: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            margin-bottom: 8px;
            font-size: 13px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .demo-credentials .credential-item:last-child {
            margin-bottom: 0;
        }

        .demo-credentials .badge {
            font-size: 11px;
        }

        @media (max-width: 576px) {
            .login-box {
                width: 90%;
                margin: 20px auto;
            }

            .login-card-body {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card login-card">
            <!-- Logo Section -->
            <div class="login-logo-box">
                <img src="{{ asset('Laravel-logo.png') }}" alt="Laravel Logo">
                <h1>Laravel App</h1>
                <p>Role & Permission Management System</p>
            </div>

            <!-- Login Form -->
            <div class="card-body login-card-body">
                <h3>Selamat Datang!</h3>
                <p>Silakan login untuk melanjutkan</p>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Login Gagal!</strong> Username atau password salah.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" placeholder="Masukkan username" autofocus required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            @error('username')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" style="margin-bottom: 0; font-weight: normal; cursor: pointer;">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-login btn-block">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </form>

            </div>

            <!-- Footer -->
            <div class="login-footer">
                <p><strong>&copy; 2025 Laravel Application</strong></p>
                <p>Powered by <a href="https://laravel.com" target="_blank">Laravel</a> &
                    <a href="https://adminlte.io" target="_blank">AdminLTE</a>
                </p>
                <p class="text-muted" style="font-size: 12px;">
                    <i class="fas fa-shield-alt"></i> Secure Role & Permission Management
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template_lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template_lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template_lte/dist/js/adminlte.min.js') }}"></script>

    <script>
        // Auto-hide alerts after 5 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);

            // Remove invalid class on input focus
            $('.form-control').on('focus', function() {
                $(this).removeClass('is-invalid');
            });

            // Add loading state to button on submit
            $('form').on('submit', function() {
                const btn = $(this).find('button[type="submit"]');
                btn.html('<i class="fas fa-spinner fa-spin mr-2"></i> Loading...');
                btn.prop('disabled', true);
            });
        });
    </script>
</body>

</html>
