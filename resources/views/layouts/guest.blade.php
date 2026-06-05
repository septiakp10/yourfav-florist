<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'YourFav Florist') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .guest-body {
                background: linear-gradient(135deg, #fff0f5 0%, #fce4ec 50%, #f8bbd0 100%);
                min-height: 100vh;
            }
            .auth-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(207, 116, 134, 0.15);
                border: 1px solid #f8bbd0;
                overflow: hidden;
            }
            .auth-card .card-body {
                padding: 2rem;
            }
            .auth-brand {
                color: #CF7486;
                font-weight: 700;
                font-size: 1.6rem;
            }
        </style>
    </head>
    <body class="guest-body d-flex align-items-center justify-content-center">
        <div class="w-100" style="max-width: 420px; padding: 0 16px;">
            <div class="text-center mb-4">
                <a href="{{ route('home') }}" class="text-decoration-none">
                    <div class="auth-brand">🌸 YourFav Florist</div>
                </a>
            </div>

            <div class="auth-card">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
