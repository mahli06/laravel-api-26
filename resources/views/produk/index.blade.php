@extends('layout.app')

@section('title', 'Daftar Produk')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Daftar Produk</h2>
        <p class="text-muted mb-0">Kelola data produk dengan mudah.</p>
    </div>

    <a href="{{ route('produk.create') }}" class="btn btn-primary px-3">
        + Tambah Produk
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-5">
                <input type="text"
                       id="cariProduk"
                       class="form-control"
                       placeholder="Cari nama, SKU, atau kategori produk...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tabelProduk">

                <thead style="background-color: #183b56; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->sku ?? '-' }}</td>
                            <td>{{ $product->category?->nama ?? '-' }}</td>
                            <td class="fw-semibold">{{ $product->name }}</td>

                            <td>
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td>{{ $product->stok }}</td>

                            <td class="text-center">
                                <a href="{{ route('produk.edit', $product->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('produk.destroy', $product->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada data produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <small class="text-muted">
                Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk
            </small>

            {{ $products->links() }}
        </div>

    </div>
</div>

<script>
    document.getElementById('cariProduk').addEventListener('keyup', function () {
        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll('#tabelProduk tbody tr');

        rows.forEach(function (row) {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(keyword) ? '' : 'none';
        });
    });
</script>

@endsection