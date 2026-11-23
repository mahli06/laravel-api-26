@extends('layout.app')

@section('title', 'Daftar Kategori')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Daftar Kategori</h2>
        <p class="text-muted mb-0">Kelola kategori produk dengan mudah.</p>
    </div>

    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover table-bordered">

                <thead style="background-color: #183b56; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>

                            <td class="fw-semibold">
                                {{ $category->nama }}
                            </td>

                            <td class="text-center">
                                <a href="{{ route('kategori.edit', $category->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('kategori.destroy', $category->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-3">
            {{ $categories->links() }}
        </div>

    </div>
</div>

@endsection