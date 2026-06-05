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

        <!-- Google reCAPTCHA v2 -->
        <div class="mb-3 d-flex justify-content-center">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        </div>
        @if($errors->has('g-recaptcha-response'))
            <div class="text-danger small text-center mb-3">
                <i class="bi bi-exclamation-triangle me-1"></i>{{ $errors->first('g-recaptcha-response') }}
            </div>
        @endif

        <button type="submit" class="btn btn-pink w-100 fw-bold mb-3">
            <i class="bi bi-person-plus me-1"></i> Daftar
        </button>
    </form>

    <!-- Divider -->
    <div class="d-flex align-items-center my-3">
        <hr class="flex-grow-1">
        <span class="px-3 text-muted small">atau</span>
        <hr class="flex-grow-1">
    </div>

    <!-- Google SSO Button -->
    <a href="{{ route('auth.google.redirect') }}" class="btn btn-outline-secondary w-100 fw-semibold d-flex align-items-center justify-content-center gap-2">
        <svg width="18" height="18" viewBox="0 0 48 48"><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/></svg>
        Daftar dengan Google
    </a>

    <div class="text-center mt-3">
        <span class="text-muted small">Sudah punya akun?</span>
        <a href="{{ route('login') }}" class="text-pink fw-semibold small text-decoration-none">
            Masuk di sini
        </a>
    </div>

    <!-- reCAPTCHA Script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</x-guest-layout>
