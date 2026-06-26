@extends('layouts.app')

@section('title', 'Detail Bunga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Data Bunga</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                @if($flower->gambar)
                    <img src="{{ asset('storage/' . $flower->gambar) }}" 
                         alt="{{ $flower->nama_bunga }}" 
                         class="img-fluid rounded" style="max-height: 400px;">
                @else
                    <div class="bg-light text-center p-5 rounded">
                        <i class="fas fa-image fa-4x text-muted"></i>
                        <p class="text-muted mt-2">Tidak ada gambar</p>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th width="30%">Kode Bunga</th>
                        <td>{{ $flower->kode_bunga }}</td>
                    </tr>
                    <tr>
                        <th>Nama Bunga</th>
                        <td>{{ $flower->nama_bunga }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $flower->kategori }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($flower->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>{{ $flower->stok }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $flower->tanggal_masuk->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $flower->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>{{ $flower->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="{{ route('flowers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
            <a href="{{ route('flowers.edit', $flower) }}" class="btn btn-warning text-white">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
        </div>
    </div>
</div>
@endsection