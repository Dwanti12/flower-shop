<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - 🌸 Flower Shop</title>
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
        .register-card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(236, 64, 122, 0.2);
            border: none;
            overflow: hidden;
            width: 100%;
            max-width: 460px;
            background: #fff;
        }
        .register-card .card-header {
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
            padding: 25px 20px;
            text-align: center;
            border: none;
        }
        .register-card .card-header h3 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-family: 'Playfair Display', serif;
        }
        .register-card .card-header p {
            color: rgba(255,255,255,0.9);
            margin: 5px 0 0;
            font-size: 0.9rem;
        }
        .register-card .card-body {
            padding: 25px 30px 30px;
            background: #fff;
        }
        .register-card .card-body .form-label {
            color: #2d3436;
            font-weight: 500;
        }
        .register-card .card-body .form-label i {
            color: #ec407a;
        }
        .form-control:focus {
            border-color: #ec407a;
            box-shadow: 0 0 0 0.2rem rgba(236, 64, 122, 0.15);
        }
        .btn-register {
            background: linear-gradient(135deg, #f48fb1, #ec407a);
            border: none;
            color: #fff;
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
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
        .register-card .card-footer {
            background: #fce4ec;
            border-top: 1px solid #f8bbd0;
            padding: 15px;
            text-align: center;
        }
        .register-card .card-footer small {
            color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card register-card">
                    <div class="card-header">
                        <span class="brand-icon">🌸</span>
                        <h3>Buat Akun Baru</h3>
                        <p>Daftar untuk mulai mengelola toko bunga</p>
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

                        <form action="{{ route('register.post') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user me-2"></i>Nama Lengkap
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" 
                                       placeholder="Masukkan nama lengkap" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Masukkan email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Password
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
                                    <i class="fas fa-check-circle me-2"></i>Konfirmasi Password
                                </label>
                                <input type="password" class="form-control" 
                                       id="password_confirmation" name="password_confirmation" 
                                       placeholder="Ulangi password" required>
                            </div>

                            <button type="submit" class="btn btn-register w-100">
                                <i class="fas fa-user-plus me-2"></i>Daftar
                            </button>
                        </form>

                        <div class="mt-4 text-center auth-links">
                            <p class="mb-0">
                                Sudah punya akun? 
                                <a href="{{ route('login') }}">Login di sini</a>
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