<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h5 class="text-center fw-bold mb-3" style="color:#CF7486;">Masuk ke Akun Anda</h5>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input id="email" class="form-control" type="email" name="email"
                   value="{{ old('email') }}" required autofocus autocomplete="username"
                   placeholder="Masukkan email">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input id="password" class="form-control" type="password" name="password"
                   required autocomplete="current-password" placeholder="Masukkan password">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Remember Me -->
        <div class="mb-3">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember"
                       style="border-color:#CF7486;">
                <label class="form-check-label small" for="remember_me">Ingat saya</label>
            </div>
        </div>

        <button type="submit" class="btn btn-pink w-100 fw-bold mb-3">
            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
        </button>

        <div class="text-center">
            <span class="text-muted small">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="text-pink fw-semibold small text-decoration-none">
                Daftar sekarang
            </a>
        </div>
    </form>
</x-guest-layout>
