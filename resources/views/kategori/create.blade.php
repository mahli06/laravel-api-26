@extends('layout.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Tambah Kategori</h2>
    <p class="text-muted">Tambahkan kategori baru untuk produk.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label fw-semibold">Nama Kategori</label>

                <input type="text"
                       name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       value="{{ old('nama') }}"
                       placeholder="Contoh: Makanan, Minuman, Elektronik">

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    Simpan Kategori
                </button>

                <a href="{{ route('kategori.index') }}"
                   class="btn btn-secondary px-4">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection