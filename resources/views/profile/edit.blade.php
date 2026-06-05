@extends('layouts.main')

@section('title', 'Edit Profile - YourFav Florist')

@push('styles')
<style>
    .profile-section {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 28px;
        margin-bottom: 20px;
    }
    .profile-section h5 {
        color: #CF7486;
        font-weight: 700;
        margin-bottom: 16px;
    }
    .profile-photo-current {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #f8bbd0;
    }
    .profile-photo-placeholder {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: #fce4ec;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: #CF7486;
        border: 4px solid #f8bbd0;
    }
    .btn-pink-form {
        background: linear-gradient(135deg, #CF7486 0%, #e8a0b0 100%);
        color: #fff;
        border: none;
        font-weight: 600;
        padding: 8px 24px;
        border-radius: 10px;
        transition: all 0.3s;
    }
    .btn-pink-form:hover {
        background: linear-gradient(135deg, #B85A70 0%, #CF7486 100%);
        color: #fff;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h2 class="fw-bold text-pink mb-4"><i class="bi bi-person-gear me-2"></i>Edit Profile</h2>

            {{-- Profile Photo Section --}}
            <div class="profile-section">
                <h5><i class="bi bi-camera me-2"></i>Foto Profil</h5>

                <div class="d-flex align-items-center gap-4 mb-3">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/profiles/' . $user->profile_photo) }}"
                             alt="Profile Photo" class="profile-photo-current">
                    @else
                        <div class="profile-photo-placeholder">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                    <div>
                        <p class="fw-semibold mb-1">{{ $user->name }}</p>
                        <p class="text-muted small mb-0">{{ $user->email }}</p>
                        <span class="badge bg-{{ $user->isAdmin() ? 'danger' : 'secondary' }} mt-1">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>
                </div>

                @if(session('status') === 'photo-updated')
                <div class="alert alert-success alert-sm py-2">
                    <i class="bi bi-check-circle me-1"></i> Foto profil berhasil diperbarui!
                </div>
                @endif

                <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-end gap-3">
                        <div class="flex-grow-1">
                            <input type="file" name="profile_photo" class="form-control" accept="image/*" required>
                            @error('profile_photo')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-pink-form">
                            <i class="bi bi-upload me-1"></i> Upload
                        </button>
                    </div>
                </form>
            </div>

            {{-- Profile Information --}}
            <div class="profile-section">
                <h5><i class="bi bi-person me-2"></i>Informasi Profil</h5>

                @if(session('status') === 'profile-updated')
                <div class="alert alert-success alert-sm py-2">
                    <i class="bi bi-check-circle me-1"></i> Profil berhasil diperbarui!
                </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama</label>
                        <input type="text" id="name" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-pink-form">
                        <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                    </button>
                </form>
            </div>

            {{-- Update Password --}}
            <div class="profile-section">
                <h5><i class="bi bi-lock me-2"></i>Ubah Password</h5>

                @if(session('status') === 'password-updated')
                <div class="alert alert-success alert-sm py-2">
                    <i class="bi bi-check-circle me-1"></i> Password berhasil diperbarui!
                </div>
                @endif

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-semibold">Password Saat Ini</label>
                        <input type="password" id="current_password" name="current_password" class="form-control">
                        @error('current_password', 'updatePassword')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password Baru</label>
                        <input type="password" id="password" name="password" class="form-control">
                        @error('password', 'updatePassword')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        @error('password_confirmation', 'updatePassword')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-pink-form">
                        <i class="bi bi-lock me-1"></i> Update Password
                    </button>
                </form>
            </div>

            {{-- Delete Account --}}
            <div class="profile-section border border-danger border-opacity-25">
                <h5 class="text-danger"><i class="bi bi-exclamation-triangle me-2"></i>Hapus Akun</h5>
                <p class="text-muted small">Setelah akun dihapus, semua data akan hilang secara permanen.</p>

                <form method="post" action="{{ route('profile.destroy') }}"
                      onsubmit="return confirm('Yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan!')">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label for="delete_password" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" id="delete_password" name="password" class="form-control"
                               placeholder="Masukkan password untuk konfirmasi">
                        @error('password', 'userDeletion')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> Hapus Akun
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
