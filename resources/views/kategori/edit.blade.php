@extends('layout.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Kategori</h2>
    <p class="text-muted">Perbarui nama kategori produk.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('kategori.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="form-label fw-semibold">Nama Kategori</label>

                <input
                    type="text"
                    name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $category->nama) }}"
                    placeholder="Masukkan nama kategori"
                >

                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    Simpan Perubahan
                </button>

                <a href="{{ route('kategori.index') }}" class="btn btn-secondary px-4">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
