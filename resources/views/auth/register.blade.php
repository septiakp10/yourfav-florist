<x-guest-layout>
    <h5 class="text-center fw-bold mb-3" style="color:#CF7486;">Buat Akun Baru</h5>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
            <input id="name" class="form-control" type="text" name="name"
                   value="{{ old('name') }}" required autofocus autocomplete="name"
                   placeholder="Masukkan nama lengkap">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input id="email" class="form-control" type="email" name="email"
                   value="{{ old('email') }}" required autocomplete="username"
                   placeholder="Masukkan email">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" class="form-control" type="password" name="password"
                   required autocomplete="new-password" placeholder="Minimal 8 karakter">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
            <input id="password_confirmation" class="form-control" type="password"
                   name="password_confirmation" required autocomplete="new-password"
                   placeholder="Ulangi password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <button type="submit" class="btn btn-pink w-100 fw-bold mb-3">
            <i class="bi bi-person-plus me-1"></i> Daftar
        </button>

        <div class="text-center">
            <span class="text-muted small">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="text-pink fw-semibold small text-decoration-none">
                Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>
