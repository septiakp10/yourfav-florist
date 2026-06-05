@extends('layouts.main')

@section('title', 'Dashboard - YourFav Florist')

@push('styles')
<style>
    .dashboard-header {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 50%, #f5c6d0 100%);
        color: #fff;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 24px;
    }
    .stat-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: transform 0.2s;
        overflow: hidden;
    }
    .stat-card:hover {
        transform: translateY(-4px);
    }
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
    }
    .quick-link-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        transition: all 0.3s;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }
    .quick-link-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(207, 116, 134, 0.2);
        color: inherit;
    }
    .profile-avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(255,255,255,0.5);
    }
    .profile-avatar-placeholder {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        border: 3px solid rgba(255,255,255,0.5);
    }
</style>
@endpush

@section('content')

<div class="container mt-4 mb-5">

    {{-- Welcome Header --}}
    <div class="dashboard-header">
        <div class="d-flex align-items-center gap-3">
            @if(Auth::user()->profile_photo)
                <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}"
                     alt="Avatar" class="profile-avatar">
            @else
                <div class="profile-avatar-placeholder">
                    <i class="bi bi-person-fill"></i>
                </div>
            @endif
            <div>
                <h2 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                <p class="mb-0 opacity-75">
                    <span class="badge bg-light text-dark me-2">{{ ucfirst(Auth::user()->role) }}</span>
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon bg-pink bg-opacity-10" style="background:#fce4ec;">
                        <i class="bi bi-box-seam text-pink"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Total Produk</p>
                        <h4 class="fw-bold text-pink mb-0">{{ $totalProducts }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:#e8f5e9;">
                        <i class="bi bi-stack text-success"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Total Stok</p>
                        <h4 class="fw-bold text-success mb-0">{{ $totalStok }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:#fff3e0;">
                        <i class="bi bi-tags text-warning"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Kategori</p>
                        <h4 class="fw-bold text-warning mb-0">{{ $totalCategories }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon" style="background:#ede7f6;">
                        <i class="bi bi-award text-purple" style="color:#7b1fa2;"></i>
                    </div>
                    <div>
                        <p class="text-muted small mb-0">Brand</p>
                        <h4 class="fw-bold mb-0" style="color:#7b1fa2;">{{ $totalBrands }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- User Info Card --}}
    <div class="row g-4">
        <div class="col-md-5">
            <div class="card stat-card h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-pink mb-3"><i class="bi bi-person-badge me-2"></i>Informasi Profil</h5>
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted" style="width:120px;">Nama</td>
                            <td class="fw-semibold">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Email</td>
                            <td class="fw-semibold">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Role</td>
                            <td>
                                <span class="badge bg-{{ Auth::user()->isAdmin() ? 'danger' : 'secondary' }}">
                                    {{ ucfirst(Auth::user()->role) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Bergabung</td>
                            <td class="fw-semibold">{{ Auth::user()->created_at->format('d M Y') }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-pink btn-sm mt-3">
                        <i class="bi bi-pencil me-1"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        {{-- Quick Links --}}
        <div class="col-md-7">
            <div class="card stat-card h-100">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-pink mb-3"><i class="bi bi-lightning me-2"></i>Akses Cepat</h5>
                    <div class="row g-3">
                        <div class="col-6">
                            <a href="{{ route('products.index') }}" class="card quick-link-card h-100">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-flower1 fs-2 text-pink d-block mb-2"></i>
                                    <span class="fw-semibold">Lihat Produk</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('home') }}" class="card quick-link-card h-100">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-house fs-2 text-pink d-block mb-2"></i>
                                    <span class="fw-semibold">Beranda</span>
                                </div>
                            </a>
                        </div>
                        @if(Auth::user()->isAdmin())
                        <div class="col-6">
                            <a href="{{ route('admin.products.index') }}" class="card quick-link-card h-100">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-gear fs-2 text-pink d-block mb-2"></i>
                                    <span class="fw-semibold">Kelola Produk</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('admin.products.create') }}" class="card quick-link-card h-100">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-plus-circle fs-2 text-pink d-block mb-2"></i>
                                    <span class="fw-semibold">Tambah Produk</span>
                                </div>
                            </a>
                        </div>
                        @endif
                        <div class="col-6">
                            <a href="{{ route('profile.edit') }}" class="card quick-link-card h-100">
                                <div class="card-body text-center py-4">
                                    <i class="bi bi-person-gear fs-2 text-pink d-block mb-2"></i>
                                    <span class="fw-semibold">Edit Profile</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
