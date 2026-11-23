```blade
@extends('layout.app')

@section('title', 'Edit Produk')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold mb-1">Edit Produk</h2>
    <p class="text-muted">Perbarui informasi produk yang sudah tersimpan.</p>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">

        <form action="{{ route('produk.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-semibold">SKU</label>
                <input type="text"
                       name="sku"
                       class="form-control @error('sku') is-invalid @enderror"
                       value="{{ old('sku', $product->sku) }}"
                       placeholder="Masukkan kode produk">

                @error('sku')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Kategori</label>
                <select name="category_id"
                        class="form-select @error('category_id') is-invalid @enderror">

                    <option value="">-- Pilih Kategori --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Produk</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name', $product->name) }}"
                       placeholder="Masukkan nama produk">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Harga</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number"
                           name="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}"
                           placeholder="Masukkan harga">
                </div>

                @error('price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Stok</label>
                <input type="number"
                       name="stok"
                       class="form-control @error('stok') is-invalid @enderror"
                       value="{{ old('stok', $product->stok) }}"
                       placeholder="Masukkan jumlah stok">

                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          rows="3"
                          placeholder="Tuliskan deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning px-4">
                    Perbarui Produk
                </button>

                <a href="{{ route('produk.index') }}"
                   class="btn btn-secondary px-4">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection
```