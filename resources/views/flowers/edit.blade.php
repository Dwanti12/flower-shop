@extends('layouts.app')

@section('title', 'Edit Bunga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-edit me-2"></i>Edit Data Bunga
        </h5>
    </div>
    <div class="card-body">
        <form action="{{ route('flowers.update', $flower) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_bunga" class="form-label">
                        <i class="fas fa-barcode me-1"></i>Kode Bunga *
                    </label>
                    <input type="text" class="form-control @error('kode_bunga') is-invalid @enderror" 
                           id="kode_bunga" name="kode_bunga" 
                           value="{{ old('kode_bunga', $flower->kode_bunga) }}" 
                           placeholder="Contoh: B001" required>
                    @error('kode_bunga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_bunga" class="form-label">
                        <i class="fas fa-flower me-1"></i>Nama Bunga *
                    </label>
                    <input type="text" class="form-control @error('nama_bunga') is-invalid @enderror" 
                           id="nama_bunga" name="nama_bunga" 
                           value="{{ old('nama_bunga', $flower->nama_bunga) }}" 
                           placeholder="Contoh: Mawar Merah" required>
                    @error('nama_bunga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">
                        <i class="fas fa-tag me-1"></i>Kategori *
                    </label>
                    <select class="form-select @error('kategori') is-invalid @enderror" 
                            id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        @foreach(['Mawar', 'Anggrek', 'Melati', 'Tulip', 'Lili', 'Lainnya'] as $kat)
                            <option value="{{ $kat }}" 
                                {{ old('kategori', $flower->kategori) == $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="harga" class="form-label">
                        <i class="fas fa-money-bill me-1"></i>Harga (Rp) *
                    </label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                           id="harga" name="harga" 
                           value="{{ old('harga', $flower->harga) }}" 
                           min="0" step="0.01" placeholder="75000" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="stok" class="form-label">
                        <i class="fas fa-boxes me-1"></i>Stok *
                    </label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                           id="stok" name="stok" 
                           value="{{ old('stok', $flower->stok) }}" 
                           min="0" placeholder="50" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">
                        <i class="fas fa-calendar me-1"></i>Tanggal Masuk *
                    </label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                           id="tanggal_masuk" name="tanggal_masuk" 
                           value="{{ old('tanggal_masuk', $flower->tanggal_masuk->format('Y-m-d')) }}" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <label for="deskripsi" class="form-label">
                        <i class="fas fa-align-left me-1"></i>Deskripsi
                    </label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                              id="deskripsi" name="deskripsi" rows="3" 
                              placeholder="Masukkan deskripsi bunga...">{{ old('deskripsi', $flower->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-12 mb-3">
                    <label for="gambar" class="form-label">
                        <i class="fas fa-image me-1"></i>Gambar Bunga
                    </label>
                    
                    @if($flower->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $flower->gambar) }}" 
                                 alt="{{ $flower->nama_bunga }}" 
                                 style="width: 150px; height: 150px; object-fit: cover; border-radius: 10px; border: 2px solid #ff6b6b;">
                            <br>
                            <small class="text-muted">Gambar saat ini</small>
                        </div>
                    @endif
                    
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                           id="gambar" name="gambar" accept="image/*">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        Format: jpeg, png, jpg | Max: 2MB
                        @if($flower->gambar)
                            <br><i class="fas fa-sync me-1"></i>
                            Kosongkan jika tidak ingin mengubah gambar
                        @endif
                    </small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ route('flowers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <div>
                    <button type="reset" class="btn btn-warning text-white me-2">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection