@extends('layouts.main')

@section('title', 'Daftar Produk - YourFav Florist')

@push('styles')
<style>
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
        letter-spacing: 0.5px;
        vertical-align: middle;
        border: none;
    }
    .table tbody tr {
        transition: background 0.2s;
    }
    .table tbody tr:hover {
        background: #fce4ec;
    }
    .badge-category {
        background: linear-gradient(135deg, #CF7486, #e8a0b0);
        color: #fff;
        font-size: 0.8rem;
        padding: 5px 12px;
        border-radius: 20px;
    }
    .badge-brand {
        background: linear-gradient(135deg, #7b1fa2, #ba68c8);
        color: #fff;
        font-size: 0.8rem;
        padding: 5px 12px;
        border-radius: 20px;
    }
    .page-title {
        color: #CF7486;
        font-weight: 800;
        letter-spacing: -0.5px;
    }
    .page-subtitle {
        color: #888;
        font-size: 1rem;
    }
    .product-img-thumb {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #f8bbd0;
    }
    .stat-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: transform 0.2s;
    }
    .stat-card:hover {
        transform: translateY(-4px);
    }
    .btn-back {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 8px 20px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-back:hover {
        background: linear-gradient(135deg, #B85A70 0%, #CF7486 100%);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(207, 116, 134, 0.3);
    }
    .harga-text {
        color: #CF7486;
        font-weight: 700;
    }
</style>
@endpush

@section('content')

    {{-- ===================== HEADER ===================== --}}
    <div class="container mt-5 mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="page-title mb-1">🌸 Daftar Produk</h1>
                <p class="page-subtitle mb-0">Semua data produk beserta kategori dan brand</p>
            </div>
            <a href="{{ route('home') }}" class="btn btn-back">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

    {{-- ===================== STATISTIK CARDS ===================== --}}
    <div class="container mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-box-seam fs-2 text-pink"></i>
                        <h6 class="mt-2 text-muted">Total Produk</h6>
                        <h3 class="text-pink fw-bold">{{ $products->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-tags fs-2 text-pink"></i>
                        <h6 class="mt-2 text-muted">Total Kategori</h6>
                        <h3 class="text-pink fw-bold">{{ $products->pluck('category.nama_category')->unique()->count() }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-award fs-2 text-pink"></i>
                        <h6 class="mt-2 text-muted">Total Brand</h6>
                        <h3 class="text-pink fw-bold">{{ $products->pluck('brand.nama_brand')->unique()->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ===================== TABEL PRODUK ===================== --}}
    <div class="container mb-5">
        <div class="product-table-wrapper">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-header-pink">
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Brand</th>
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
                                        <i class="bi bi-flower1 text-pink fs-4"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="fw-semibold">{{ $product->nama_product }}</td>
                            <td class="text-muted small" style="max-width: 250px;">{{ $product->deskripsi ?? '-' }}</td>
                            <td class="harga-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $product->stok > 10 ? 'bg-success' : ($product->stok > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">
                                    {{ $product->stok }}
                                </span>
                            </td>
                            <td><span class="badge-category">{{ $product->category->nama_category ?? '-' }}</span></td>
                            <td><span class="badge-brand">{{ $product->brand->nama_brand ?? '-' }}</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Belum ada data produk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
