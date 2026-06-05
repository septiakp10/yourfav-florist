@extends('layouts.main')

@section('title', 'YourFav Florist - Toko Buket Bunga Handmade')

@push('styles')
<script>
    const STOK_AWAL = { '1': 15, '2': 12, '3': 18 };
</script>
@endpush

@section('content')

    <!-- ===================== HERO ===================== -->
    <div class="hero-section" id="home">
        <div class="hero-overlay"></div>
        <div class="hero-content text-center text-white">
            <h1 class="hero-title">
                YourFav<br>
                <span class="hero-title-florist">Florist</span>
            </h1>
            <p class="hero-subtitle">Toko Buket Bunga Kawat Bulu Handmade</p>
        </div>
    </div>

    <!-- ===================== STATISTIK ===================== -->
    <div class="container my-5" id="statistik">
        <h2 class="text-center fw-bold text-pink mb-4">Statistik Toko</h2>
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-box-seam fs-2 text-pink"></i>
                        <h5 class="mt-3">Total Produk</h5>
                        <h2 class="text-pink fw-bold">45</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-stack fs-2 text-pink"></i>
                        <h5 class="mt-3">Stok Tersedia</h5>
                        <h2 class="text-pink fw-bold" id="totalStokDisplay">250</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center h-100">
                    <div class="card-body py-4">
                        <i class="bi bi-tags fs-2 text-pink"></i>
                        <h5 class="mt-3">Kategori</h5>
                        <h2 class="text-pink fw-bold">8</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== PRODUK ===================== -->
    <div class="bg-light py-5" id="produk">
        <div class="container">
            <h2 class="text-center fw-bold text-pink mb-4">Koleksi Buket Bunga</h2>
            <div class="row g-4" id="container-barang">

                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card h-100" data-product-id="1">
                        <img src="{{ asset('assets/Buket Romantis Pink.jpg') }}" class="card-img-top"
                             alt="Buket Romantis Pink" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Buket Romantis Pink</h5>
                            <p class="card-text small text-muted">Rangkaian bunga premium warna pink</p>
                            <p class="text-pink fw-bold mb-1">Rp 350.000</p>
                            <p class="small stok-text" data-stok-id="1">Stok: <span class="stok-value">15</span></p>
                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-pink w-50 btn-detail" data-product-name="Buket Romantis Pink">Beli</button>
                                <button class="btn btn-outline-danger w-50 btn-wishlist"
                                        data-product-name="Buket Romantis Pink">
                                    <i class="bi bi-heart"></i> Favorit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card h-100" data-product-id="2">
                        <img src="{{ asset('assets/Buket Elegan Ungu.jpg') }}" class="card-img-top"
                             alt="Buket Elegan Ungu" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Buket Elegan Ungu</h5>
                            <p class="card-text small text-muted">Bunga ungu mewah dengan sentuhan putih</p>
                            <p class="text-pink fw-bold mb-1">Rp 425.000</p>
                            <p class="small stok-text" data-stok-id="2">Stok: <span class="stok-value">12</span></p>
                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-pink w-50 btn-detail" data-product-name="Buket Elegan Ungu">Beli</button>
                                <button class="btn btn-outline-danger w-50 btn-wishlist"
                                        data-product-name="Buket Elegan Ungu">
                                    <i class="bi bi-heart"></i> Favorit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card h-100" data-product-id="3">
                        <img src="{{ asset('assets/Buket Passion Merah.jpg') }}" class="card-img-top"
                             alt="Buket Passion Merah" style="height: 220px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Buket Passion Merah</h5>
                            <p class="card-text small text-muted">Bunga merah segar untuk momen spesial</p>
                            <p class="text-pink fw-bold mb-1">Rp 400.000</p>
                            <p class="small stok-text" data-stok-id="3">Stok: <span class="stok-value">18</span></p>
                            <div class="mt-auto d-flex gap-2">
                                <button class="btn btn-pink w-50 btn-detail" data-product-name="Buket Passion Merah">Beli</button>
                                <button class="btn btn-outline-danger w-50 btn-wishlist"
                                        data-product-name="Buket Passion Merah">
                                    <i class="bi bi-heart"></i> Favorit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ===================== FORM PEMESANAN ===================== -->
    <div class="container my-5" id="form">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center fw-bold text-pink mb-4">Form Pemesanan Bunga</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div id="formResult" class="mb-3"></div>
                        <form onsubmit="submitForm(event)">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama"
                                       placeholder="Masukkan nama Anda" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor WhatsApp</label>
                                <input type="text" class="form-control" id="whatsapp"
                                       placeholder="Cth: 08123456789" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Jenis Buket</label>
                                <select class="form-select" id="jenisBuket" required>
                                    <option value="">-- Pilih Jenis Buket --</option>
                                    <option value="Buket Romantis Pink">Buket Romantis Pink - Rp 350.000</option>
                                    <option value="Buket Elegan Ungu">Buket Elegan Ungu - Rp 425.000</option>
                                    <option value="Buket Passion Merah">Buket Passion Merah - Rp 400.000</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jumlah Pesanan</label>
                                <input type="number" class="form-control" id="jumlah"
                                       placeholder="Masukkan jumlah" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-pink w-100 fw-bold">
                                <i class="bi bi-bag-check"></i> Pesan Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== MODAL WISHLIST ===================== -->
    <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-heart-fill text-danger"></i> Daftar Favorit Saya
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">
                        <i class="bi bi-trash"></i> Kosongkan
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endpush