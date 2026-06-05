@extends('layouts.main')

@section('title', 'Edit Produk - Admin')

@push('styles')
<style>
    .form-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.07);
        border: none;
    }
    .form-header {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
        border-radius: 16px 16px 0 0;
        padding: 20px 28px;
    }
    .btn-simpan {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
        border: none;
        font-weight: 600;
        padding: 10px 32px;
        border-radius: 10px;
        transition: all 0.3s;
    }
    .btn-simpan:hover {
        background: linear-gradient(135deg, #B85A70 0%, #CF7486 100%);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(207, 116, 134, 0.3);
    }
    .current-img {
        max-width: 150px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #f8bbd0;
    }
    .preview-img {
        max-width: 200px;
        max-height: 200px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #f8bbd0;
        display: none;
        margin-top: 10px;
    }
</style>
@endpush

@section('content')

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="form-card">
                <div class="form-header">
                    <h4 class="fw-bold mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Produk</h4>
                </div>
                <div class="card-body p-4">

                    {{-- Validation Errors --}}
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="nama_product" class="form-control"
                                   value="{{ old('nama_product', $product->nama_product) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Harga (Rp) <span class="text-danger">*</span></label>
                                <input type="number" name="harga" class="form-control"
                                       value="{{ old('harga', $product->harga) }}" min="0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Stok <span class="text-danger">*</span></label>
                                <input type="number" name="stok" class="form-control"
                                       value="{{ old('stok', $product->stok) }}" min="0" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->category_id }}"
                                            {{ old('category_id', $product->category_id) == $cat->category_id ? 'selected' : '' }}>
                                            {{ $cat->nama_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Brand <span class="text-danger">*</span></label>
                                <select name="brand_id" class="form-select" required>
                                    <option value="">-- Pilih Brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->brand_id }}"
                                            {{ old('brand_id', $product->brand_id) == $brand->brand_id ? 'selected' : '' }}>
                                            {{ $brand->nama_brand }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Gambar Produk</label>

                            @if($product->gambar)
                            <div class="mb-2">
                                <p class="text-muted small mb-1">Gambar saat ini:</p>
                                <img src="{{ asset('storage/products/' . $product->gambar) }}"
                                     alt="{{ $product->nama_product }}"
                                     class="current-img">
                            </div>
                            @endif

                            <input type="file" name="gambar" class="form-control" accept="image/*"
                                   onchange="previewImage(event)">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar</small>
                            <br>
                            <img id="preview" class="preview-img" alt="Preview">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-simpan">
                                <i class="bi bi-check-lg me-1"></i> Update Produk
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
}
</script>
@endpush
