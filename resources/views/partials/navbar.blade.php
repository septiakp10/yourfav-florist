{{-- ===================== NAVBAR ===================== --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">🌸 YourFav Florist</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                </li>

                @auth
                    {{-- Dashboard --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    {{-- Admin: Kelola Produk --}}
                    @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link text-pink fw-semibold" href="{{ route('admin.products.index') }}">
                            <i class="bi bi-gear me-1"></i>Kelola Produk
                        </a>
                    </li>
                    @endif

                    {{-- User info + Dropdown --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown">
                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/profiles/' . Auth::user()->profile_photo) }}"
                                     alt="Avatar" class="rounded-circle" style="width:28px;height:28px;object-fit:cover;">
                            @else
                                <i class="bi bi-person-circle"></i>
                            @endif
                            {{ Auth::user()->name }}
                            <span class="badge bg-{{ Auth::user()->isAdmin() ? 'danger' : 'secondary' }} ms-1" style="font-size:0.65rem;">
                                {{ ucfirst(Auth::user()->role) }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="bi bi-person me-2"></i>Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- Guest: Login / Register --}}
                    <li class="nav-item">
                        <a class="btn btn-outline-pink btn-sm" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-pink btn-sm" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>Register
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
