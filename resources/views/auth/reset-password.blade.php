<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - 🌸 Flower Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 50%, #f48fb1 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }
        .reset-card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(236, 64, 122, 0.2);
            border: none;
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            background: #fff;
        }
        .reset-card .card-header {
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
            padding: 30px 20px;
            text-align: center;
            border: none;
        }
        .reset-card .card-header h3 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-family: 'Playfair Display', serif;
        }
        .reset-card .card-header p {
            color: rgba(255,255,255,0.9);
            margin: 5px 0 0;
            font-size: 0.9rem;
        }
        .reset-card .card-body {
            padding: 30px;
            background: #fff;
        }
        .form-control:focus {
            border-color: #ec407a;
            box-shadow: 0 0 0 0.2rem rgba(236, 64, 122, 0.15);
        }
        .btn-reset {
            background: linear-gradient(135deg, #f48fb1, #ec407a);
            border: none;
            color: #fff;
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-reset:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(236, 64, 122, 0.35);
            color: #fff;
            background: linear-gradient(135deg, #ec407a, #d81b60);
        }
        .auth-links a {
            color: #ec407a;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        .auth-links a:hover {
            color: #d81b60;
            text-decoration: underline;
        }
        .brand-icon {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 5px;
        }
        .password-requirements {
            font-size: 12px;
            color: #6c757d;
        }
        .password-requirements .valid {
            color: #27ae60;
        }
        .password-requirements .invalid {
            color: #e74c3c;
        }
        .reset-card .card-footer {
            background: #fce4ec;
            border-top: 1px solid #f8bbd0;
            padding: 15px;
            text-align: center;
        }
        .reset-card .card-footer small {
            color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card reset-card">
                    <div class="card-header">
                        <span class="brand-icon">🔄</span>
                        <h3>Reset Password</h3>
                        <p>Masukkan password baru Anda</p>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control" 
                                       id="email" value="{{ $email ?? old('email') }}" disabled>
                                <small class="text-muted">Email tidak dapat diubah</small>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password Baru
                                </label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" placeholder="Minimal 8 karakter" required>
                                <div class="password-requirements mt-1">
                                    <span id="lengthCheck" class="invalid">● Minimal 8 karakter</span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">
                                    <i class="fas fa-check-circle me-2"></i>Konfirmasi Password Baru
                                </label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Ulangi password baru" required>
                            </div>

                            <button type="submit" class="btn btn-reset w-100">
                                <i class="fas fa-save me-2"></i>Reset Password
                            </button>
                        </form>

                        <div class="mt-4 text-center auth-links">
                            <p class="mb-0">
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small>💗 {{ date('Y') }} Flower Shop</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('password').addEventListener('input', function() {
            const length = this.value.length;
            const lengthCheck = document.getElementById('lengthCheck');
            if (length >= 8) {
                lengthCheck.className = 'valid';
                lengthCheck.textContent = '✓ Minimal 8 karakter';
            } else {
                lengthCheck.className = 'invalid';
                lengthCheck.textContent = '● Minimal 8 karakter';
            }
        });
    </script>
</body>
</html>