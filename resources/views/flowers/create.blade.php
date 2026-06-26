@extends('layouts.app')

@section('title', 'Tambah Bunga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Tambah Data Bunga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('flowers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_bunga" class="form-label">Kode Bunga *</label>
                    <input type="text" class="form-control @error('kode_bunga') is-invalid @enderror" 
                           id="kode_bunga" name="kode_bunga" value="{{ old('kode_bunga') }}" required>
                    @error('kode_bunga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_bunga" class="form-label">Nama Bunga *</label>
                    <input type="text" class="form-control @error('nama_bunga') is-invalid @enderror" 
                           id="nama_bunga" name="nama_bunga" value="{{ old('nama_bunga') }}" required>
                    @error('nama_bunga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">Kategori *</label>
                    <select class="form-select @error('kategori') is-invalid @enderror" 
                            id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Mawar" {{ old('kategori') == 'Mawar' ? 'selected' : '' }}>Mawar</option>
                        <option value="Anggrek" {{ old('kategori') == 'Anggrek' ? 'selected' : '' }}>Anggrek</option>
                        <option value="Melati" {{ old('kategori') == 'Melati' ? 'selected' : '' }}>Melati</option>
                        <option value="Tulip" {{ old('kategori') == 'Tulip' ? 'selected' : '' }}>Tulip</option>
                        <option value="Lili" {{ old('kategori') == 'Lili' ? 'selected' : '' }}>Lili</option>
                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="harga" class="form-label">Harga (Rp) *</label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                           id="harga" name="harga" value="{{ old('harga') }}" min="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="stok" class="form-label">Stok *</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                           id="stok" name="stok" value="{{ old('stok') }}" min="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk *</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                           id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <label for="gambar" class="form-label">Gambar Bunga</label>
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                           id="gambar" name="gambar" accept="image/*">
                    <small class="text-muted">Format: jpeg, png, jpg | Max: 2MB</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('flowers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection