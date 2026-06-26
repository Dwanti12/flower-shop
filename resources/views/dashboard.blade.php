@extends('layouts.app')

@section('title', 'Dashboard')
@section('icon', 'home')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label">Total Bunga</p>
                    <h2 class="stat-number">{{ $totalBunga ?? 0 }}</h2>
                </div>
                <div class="stat-icon pink">
                    <i class="fas fa-flower"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label">Total Stok</p>
                    <h2 class="stat-number">{{ $totalStok ?? 0 }}</h2>
                </div>
                <div class="stat-icon green">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="stat-label">Total Kategori</p>
                    <h2 class="stat-number">{{ $totalKategori ?? 0 }}</h2>
                </div>
                <div class="stat-icon orange">
                    <i class="fas fa-tags"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="fas fa-heart me-2" style="color: #ec407a;"></i>
            Selamat Datang di Sistem Manajemen Toko Bunga
        </h5>
        <p class="card-text">
            Kelola data bunga dengan mudah dan efisien.
            <br>
            <span class="badge-soft-pink mt-2 d-inline-block">
                <i class="fas fa-check-circle me-1"></i> 
                Total {{ $totalBunga ?? 0 }} bunga terdaftar
            </span>
        </p>
        <div class="d-flex flex-wrap gap-2 mt-3">
            <a href="{{ route('flowers.index') }}" class="btn btn-primary">
                <i class="fas fa-list me-2"></i>Lihat Data Bunga
            </a>
            <a href="{{ route('flowers.create') }}" class="btn btn-pink">
                <i class="fas fa-plus me-2"></i>Tambah Bunga
            </a>
            <a href="{{ route('flowers.pdf') }}" class="btn btn-outline-pink" target="_blank">
                <i class="fas fa-file-pdf me-2"></i>Cetak PDF
            </a>
        </div>
    </div>
</div>
@endsection