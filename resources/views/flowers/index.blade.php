@extends('layouts.app')

@section('title', 'Data Bunga')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>Data Bunga</h4>
    <div>
        <a href="{{ route('flowers.pdf') }}" class="btn btn-danger me-2">
            <i class="fas fa-file-pdf me-2"></i>Cetak PDF
        </a>
        <a href="{{ route('flowers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Bunga
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <form action="{{ route('flowers.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="search" 
                           placeholder="Cari berdasarkan kode, nama, atau kategori..." 
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Bunga</th>
                        <th>Nama Bunga</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal Masuk</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($flowers as $flower)
                    <tr>
                        <td>{{ $loop->iteration + ($flowers->currentPage() - 1) * $flowers->perPage() }}</td>
                        <td>{{ $flower->kode_bunga }}</td>
                        <td>{{ $flower->nama_bunga }}</td>
                        <td>{{ $flower->kategori }}</td>
                        <td>Rp {{ number_format($flower->harga, 0, ',', '.') }}</td>
                        <td>{{ $flower->stok }}</td>
                        <td>{{ $flower->tanggal_masuk->format('d/m/Y') }}</td>
                        <td>
                            @if($flower->gambar)
                                <img src="{{ asset('storage/' . $flower->gambar) }}" 
                                     alt="{{ $flower->nama_bunga }}" 
                                     style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('flowers.show', $flower) }}" class="btn btn-info text-white">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('flowers.edit', $flower) }}" class="btn btn-warning text-white">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('flowers.destroy', $flower) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data bunga</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $flowers->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection