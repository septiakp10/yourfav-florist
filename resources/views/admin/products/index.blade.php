@extends('layouts.main')

@section('title', 'Kelola Produk - Admin')

@push('styles')
<style>
    .admin-header {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
        border-radius: 16px;
        padding: 24px 32px;
        margin-bottom: 24px;
    }
    .product-table-wrapper {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.07);
        overflow: hidden;
    }
    .table-header-pink {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
    }
    .table-header-pink th {
        font-weight: 600;
        border: none;
    }
    .table tbody tr:hover {
        background: #fce4ec;
    }
    .product-img-thumb {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #f8bbd0;
    }
    .btn-add {
        background: #fff;
        color: #CF7486;
        border: 2px solid #fff;
        border-radius: 10px;
        font-weight: 600;
        padding: 8px 20px;
        transition: all 0.3s;
    }
    .btn-add:hover {
        background: transparent;
        color: #fff;
        border-color: #fff;
    }
    .badge-category {
        background: linear-gradient(135deg, #CF7486, #e8a0b0);
        color: #fff;
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 20px;
    }
    .badge-brand {
        background: linear-gradient(135deg, #7b1fa2, #ba68c8);
        color: #fff;
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 20px;
    }
</style>
@endpush

@section('content')

<div class="container mt-4 mb-5">

    {{-- Header --}}
    <div class="admin-header d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1"><i class="bi bi-box-seam me-2"></i>Kelola Produk</h2>
            <p class="mb-0 opacity-75">Tambah, edit, dan hapus produk toko Anda</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-add">
            <i class="bi bi-plus-lg me-1"></i> Tambah Produk
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Table --}}
    <div class="product-table-wrapper">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-header-pink">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Brand</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index => $product)
                    <tr>
                        <td class="ps-4 fw-bold text-muted">{{ $index + 1 }}</td>
                        <td>
                            @if($product->gambar)
                                <img src="{{ asset('storage/products/' . $product->gambar) }}"
                                     alt="{{ $product->nama_product }}"
                                     class="product-img-thumb">
                            @else
                                <div class="product-img-thumb d-flex align-items-center justify-content-center bg-light">
                                    <i class="bi bi-flower1 text-pink"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $product->nama_product }}</td>
                        <td class="text-pink fw-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge {{ $product->stok > 10 ? 'bg-success' : ($product->stok > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                {{ $product->stok }}
                            </span>
                        </td>
                        <td><span class="badge-category">{{ $product->category->nama_category ?? '-' }}</span></td>
                        <td><span class="badge-brand">{{ $product->brand->nama_brand ?? '-' }}</span></td>
                        <td class="text-center">
                            <div class="d-flex gap-1 justify-content-center">
                                <a href="{{ route('admin.products.edit', $product->product_id) }}"
                                   class="btn btn-sm btn-outline-primary" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->product_id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Belum ada data produk. <a href="{{ route('admin.products.create') }}">Tambah sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
