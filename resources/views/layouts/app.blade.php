<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '🌸 Flower Shop - Sistem Manajemen Toko Bunga')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <style>
        /* ===== GLOBAL STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #fff5f7;
            overflow-x: hidden;
        }

        /* ===== SIDEBAR STYLES - PINK CANTIK ===== */

        .stat-card {
    background: #ffffff !important;
    border-radius: 15px !important;
    padding: 22px 25px !important;
    box-shadow: 0 2px 15px rgba(236, 64, 122, 0.08) !important;
    transition: all 0.3s ease !important;
    border: 1px solid rgba(236, 64, 122, 0.08) !important;
    position: relative !important;
    overflow: hidden !important;
    display: block !important;
    min-height: 100px !important;
}

.stat-card::before {
    content: '' !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 4px !important;
    background: linear-gradient(90deg, #f8bbd0, #ec407a) !important;
}

.stat-card:hover {
    transform: translateY(-5px) !important;
    box-shadow: 0 8px 30px rgba(236, 64, 122, 0.15) !important;
}

.stat-card .stat-icon {
    width: 50px !important;
    height: 50px !important;
    border-radius: 12px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.5rem !important;
    color: #fff !important;
    flex-shrink: 0 !important;
}

.stat-card .stat-icon.pink {
    background: linear-gradient(135deg, #f8bbd0, #ec407a) !important;
}
.stat-card .stat-icon.green {
    background: linear-gradient(135deg, #a8e6cf, #55efc4) !important;
}
.stat-card .stat-icon.orange {
    background: linear-gradient(135deg, #ffd3b6, #ffb8a2) !important;
}

.stat-card .stat-number {
    font-size: 1.8rem !important;
    font-weight: 700 !important;
    color: #2d3436 !important;
    margin: 5px 0 0 !important;
    line-height: 1.2 !important;
}

.stat-card .stat-label {
    color: #6c757d !important;
    font-size: 0.85rem !important;
    font-weight: 500 !important;
    margin: 0 !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #f8bbd0 0%, #f48fb1 30%, #ec407a 70%, #d81b60 100%);
            color: #fff;
            transition: all 0.3s ease;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(236, 64, 122, 0.25);
        }

        .sidebar-brand {
            padding: 25px 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
            text-align: center;
        }

        .sidebar-brand .brand-icon {
            font-size: 2.8rem;
            display: block;
            margin-bottom: 8px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .sidebar-brand h4 {
            font-weight: 700;
            margin: 0;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
            color: #fff;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
            font-family: 'Playfair Display', serif;
        }

        .sidebar-brand small {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            padding: 20px 10px;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 4px;
        }

        .sidebar-nav .nav-link {
    color: rgba(255, 255, 255, 0.85);
    padding: 12px 18px;
    border-radius: 10px;
    transition: all 0.3s ease;
    font-weight: 500;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    position: relative;
}

.sidebar-nav .nav-link i {
    width: 24px;
    font-size: 1.1rem;
    margin-right: 12px;
    text-align: center;
}

.sidebar-nav .nav-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    transform: translateX(5px);
}

.sidebar-nav .nav-link.active {
    color: #fff;
    background: rgba(255, 255, 255, 0.25);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    border-right: 4px solid #fff;
}

.sidebar-nav .nav-link.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 24px;
    background: #fff;
    border-radius: 0 4px 4px 0;
}

.sidebar-nav .nav-link .badge {
    margin-left: auto;
    background: rgba(255, 255, 255, 0.25);
    color: #fff;
    font-weight: 600;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.7rem;
}

.sidebar-nav .nav-divider {
    height: 1px;
    background: rgba(255, 255, 255, 0.1);
    margin: 15px 10px;
}

/* ===== LOGOUT BUTTON - PUTIH ===== */
.sidebar-nav .nav-link.text-danger {
    color: #ffffff !important;
    background: rgba(255, 255, 255, 0.12) !important;
    border: 1px solid rgba(255, 255, 255, 0.15) !important;
    border-radius: 10px !important;
    margin-top: 8px !important;
    transition: all 0.3s ease !important;
}

.sidebar-nav .nav-link.text-danger:hover {
    background: rgba(255, 255, 255, 0.25) !important;
    border-color: rgba(255, 255, 255, 0.4) !important;
    transform: translateX(5px) !important;
    box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1) !important;
}

.sidebar-nav .nav-link.text-danger i {
    color: #ffffff !important;
}

        /* ===== MAIN CONTENT STYLES ===== */
        .main-content {
            min-height: 100vh;
            background: #fff5f7;
            padding: 20px;
        }

        /* ===== TOP NAVBAR STYLES ===== */
        .top-navbar {
            background: #fff;
            border-radius: 15px;
            padding: 12px 25px;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px rgba(236, 64, 122, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            border-left: 4px solid #ec407a;
        }

        .top-navbar .page-title {
            font-weight: 600;
            font-size: 1.2rem;
            color: #2d3436;
            margin: 0;
        }

        .top-navbar .page-title i {
            color: #ec407a;
            margin-right: 10px;
        }

        .top-navbar .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* ===== USER AVATAR - DIPERBAIKI ===== */
        .top-navbar .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            border: 2px solid #fff;
            box-shadow: 0 2px 10px rgba(236, 64, 122, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
        }

        .top-navbar .user-avatar:hover {
            transform: scale(1.08);
            box-shadow: 0 4px 20px rgba(236, 64, 122, 0.35);
        }

        .top-navbar .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .top-navbar .user-avatar .avatar-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
        }

        .top-navbar .user-name {
            font-weight: 600;
            color: #2d3436;
            font-size: 0.95rem;
        }

        .top-navbar .user-email {
            font-size: 0.8rem;
            color: #6c757d;
        }

        /* ===== DROPDOWN CUSTOM ===== */
        .dropdown-menu-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(236, 64, 122, 0.12);
            padding: 8px 0;
            min-width: 220px;
            margin-top: 10px;
        }

        .dropdown-menu-custom .dropdown-item {
            padding: 10px 20px;
            font-size: 0.9rem;
            color: #2d3436;
            transition: all 0.2s ease;
        }

        .dropdown-menu-custom .dropdown-item i {
            width: 20px;
            margin-right: 10px;
            text-align: center;
            color: #ec407a;
        }

        .dropdown-menu-custom .dropdown-item:hover {
            background: #fce4ec;
            color: #d81b60;
        }

        .dropdown-menu-custom .dropdown-item.text-danger i {
            color: #d81b60;
        }

        .dropdown-menu-custom .dropdown-item.text-danger:hover {
            background: #fce4ec;
        }

        .dropdown-menu-custom .dropdown-header {
            padding: 10px 20px 5px;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #ec407a;
            font-weight: 600;
        }

        .dropdown-menu-custom .dropdown-divider {
            margin: 5px 0;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                position: relative;
                padding-bottom: 10px;
            }
            
            .sidebar-brand {
                padding: 15px 20px;
            }
            
            .sidebar-brand .brand-icon {
                font-size: 2rem;
            }
            
            .sidebar-nav {
                padding: 10px;
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .sidebar-nav .nav-item {
                flex: 1;
                min-width: calc(50% - 5px);
                margin-bottom: 0;
            }
            
            .sidebar-nav .nav-link {
                padding: 10px 14px;
                font-size: 0.85rem;
                justify-content: center;
            }
            
            .sidebar-nav .nav-link i {
                margin-right: 6px;
                font-size: 1rem;
            }
            
            .sidebar-nav .nav-link .badge {
                display: none;
            }
            
            .sidebar-nav .nav-divider {
                display: none;
            }
            
            .main-content {
                padding: 15px;
            }
            
            .top-navbar {
                padding: 12px 18px;
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }
            
            .top-navbar .page-title {
                font-size: 1rem;
            }
            
            .top-navbar .user-info {
                justify-content: flex-end;
            }
        }

        @media (max-width: 480px) {
            .sidebar-nav .nav-item {
                min-width: 100%;
            }
            
            .top-navbar .user-name {
                display: none;
            }
            
            .top-navbar .user-email {
                display: none;
            }
        }

        /* ===== ANIMATIONS ===== */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #fce4ec;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #f8bbd0, #ec407a);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #ec407a;
        }

        /* ===== MOBILE TOGGLE ===== */
        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            color: #2d3436;
            font-size: 1.5rem;
            padding: 5px 10px;
        }

        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
            
            .sidebar-collapse {
                display: none;
            }
            
            .sidebar-collapse.show {
                display: block;
            }
        }

        /* ===== FOOTER ===== */
        footer .badge.bg-light {
            background: #fce4ec !important;
            color: #d81b60 !important;
        }

        /* ===== LINK ===== */
        a {
            color: #ec407a;
            text-decoration: none;
        }

        a:hover {
            color: #d81b60;
            text-decoration: underline;
        }

        /* ===== MODAL ===== */
        .modal-header {
            background: linear-gradient(135deg, #f48fb1, #ec407a);
            color: #fff;
            border-radius: 10px 10px 0 0;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- ========== SIDEBAR ========== -->
            @auth
            <div class="col-md-3 col-lg-2 d-md-block sidebar" id="sidebar">
                <div class="sidebar-brand">
                    <span class="brand-icon">🌸</span>
                    <h4>Flower Shop</h4>
                    <small>Sistem Manajemen Toko</small>
                </div>
                
                <nav class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                               href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                Dashboard
                                @if(request()->routeIs('dashboard'))
                                    <span class="badge">Active</span>
                                @endif
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('flowers.*') ? 'active' : '' }}" 
                               href="{{ route('flowers.index') }}">
                                <i class="fas fa-flower"></i>
                                Data Bunga
                                @if(request()->routeIs('flowers.*'))
                                    <span class="badge">Active</span>
                                @endif
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flowers.create') }}">
                                <i class="fas fa-plus-circle"></i>
                                Tambah Bunga
                            </a>
                        </li>
                        
                        <li class="nav-divider"></li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('flowers.pdf') }}" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                                Cetak PDF
                                <span class="badge">Report</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#" 
                               onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            @endauth

            <!-- ========== MAIN CONTENT ========== -->
            <div class="col-md-9 col-lg-10 main-content">
                @auth
                <nav class="top-navbar">
                    <div class="d-flex align-items-center gap-3">
                        <button class="sidebar-toggle" type="button" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        
                        <h5 class="page-title mb-0">
                            <i class="fas fa-@yield('icon', 'home')"></i>
                            @yield('title', 'Dashboard')
                        </h5>
                    </div>
                    
                    <div class="user-info">
                        <div class="dropdown">
                            <div class="d-flex align-items-center gap-2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- ===== AVATAR DENGAN FOTO (DIPERBAIKI) ===== -->
                                <div class="user-avatar">
                                    @php
                                        $avatarPath = public_path('images/avatars/profile.jpg');
                                        $avatarExists = file_exists($avatarPath);
                                    @endphp
                                    
                                    @if($avatarExists)
                                        <img src="{{ asset('images/avatars/profile.jpg') }}" 
                                             alt="{{ auth()->user()->name ?? 'User' }}">
                                    @else
                                        <div class="avatar-placeholder">
                                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="d-none d-md-block">
                                    <div class="user-name">{{ auth()->user()->name ?? 'Admin' }}</div>
                                    <div class="user-email">{{ auth()->user()->email ?? '' }}</div>
                                </div>
                                <i class="fas fa-chevron-down text-muted ms-1" style="font-size: 0.7rem;"></i>
                            </div>
                            
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                                <li class="dropdown-header">
                                    <i class="fas fa-user-circle me-1"></i> Akun
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user"></i> Profil
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form-navbar').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form-navbar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                @endauth

                <!-- ===== ALERT MESSAGES ===== -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-times-circle me-2"></i>
                        <strong>Terjadi kesalahan!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- ===== PAGE CONTENT ===== -->
                <div class="fade-in">
                    @yield('content')
                </div>

                <!-- ===== FOOTER ===== -->
                @auth
                <footer class="text-center text-muted mt-5 pt-3" style="border-top: 1px solid #fce4ec; font-size: 0.85rem;">
                    <p class="mb-0">
                        <i class="fas fa-heart me-1" style="color: #ec407a;"></i>
                        {{ date('Y') }} 🌸 Flower Shop - Sistem Manajemen Toko Bunga
                        <span class="mx-2">|</span>
                        <i class="fas fa-code me-1"></i> Laravel 12
                        <span class="mx-2">|</span>
                        <i class="fas fa-palette me-1"></i> Bootstrap 5
                    </p>
                </footer>
                @endauth
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-collapse');
            sidebar.classList.toggle('show');
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.querySelectorAll('.alert').forEach(function(alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>