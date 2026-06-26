<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - 🌸 Flower Shop</title>
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
        .forgot-card {
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(236, 64, 122, 0.2);
            border: none;
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            background: #fff;
        }
        .forgot-card .card-header {
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
            padding: 30px 20px;
            text-align: center;
            border: none;
        }
        .forgot-card .card-header h3 {
            color: #fff;
            font-weight: 700;
            margin: 0;
            font-family: 'Playfair Display', serif;
        }
        .forgot-card .card-header p {
            color: rgba(255,255,255,0.9);
            margin: 5px 0 0;
            font-size: 0.9rem;
        }
        .forgot-card .card-body {
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
        .forgot-card .card-footer {
            background: #fce4ec;
            border-top: 1px solid #f8bbd0;
            padding: 15px;
            text-align: center;
        }
        .forgot-card .card-footer small {
            color: #d81b60;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card forgot-card">
                    <div class="card-header">
                        <span class="brand-icon">🔑</span>
                        <h3>Lupa Password</h3>
                        <p>Kami akan kirim link reset ke email Anda</p>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

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

                        <form action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-2"></i>Email
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Masukkan email Anda" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-reset w-100">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Link Reset
                            </button>
                        </form>

                        <div class="mt-4 text-center auth-links">
                            <p class="mb-0">
                                <a href="{{ route('login') }}">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali ke Login
                                </a>
                            </p>
                            <p class="mt-2 mb-0">
                                Belum punya akun? 
                                <a href="{{ route('register') }}">Daftar sekarang</a>
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
</body>
</html>