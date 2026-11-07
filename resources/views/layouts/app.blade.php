<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'CUTORA - Premium Scissors Store')</title>

    <meta name="description" content="CUTORA menyediakan berbagai pilihan gunting berkualitas untuk kebutuhan rumah, kantor, dan profesional.">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="site-header">
    <div class="container navbar">
        <a href="{{ route('home') }}" class="brand">
            <span class="brand-icon">C</span>
            <span>CUTORA<span class="brand-dot">.</span></span>
        </a>

        <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">
            ☰
        </button>

        <nav class="nav-links" id="navLinks">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Produk</a>

            @auth
                <a href="{{ route('orders.index') }}">Pesanan Saya</a>
            @endauth
        </nav>

        <div class="nav-actions">
            <a href="{{ route('cart.index') }}" class="cart-link">
                <span>🛒</span>
                <span>Keranjang</span>
                <span class="cart-count">
                    {{ count(session('cart', [])) }}
                </span>
            </a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-dark">
                        Dashboard
                    </a>
                @else
                    <span class="user-greeting">
                        Halo, {{ auth()->user()->name }}
                    </span>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline" type="submit">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Masuk</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
            @endauth
        </div>
    </div>
</header>

@if(session('success'))
    <div class="container">
        <div class="alert alert-success">{{ session('success') }}</div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="alert alert-error">{{ session('error') }}</div>
    </div>
@endif

@if($errors->any())
    <div class="container">
        <div class="alert alert-error">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<main>
    @yield('content')
</main>

<footer class="site-footer">
    <div class="container footer-content">
        <div>
            <a href="{{ route('home') }}" class="brand footer-brand">
                <span class="brand-icon">C</span>
                <span>CUTORA<span class="brand-dot">.</span></span>
            </a>
            <p>Precision in Every Cut. Kualitas untuk setiap kebutuhan.</p>
        </div>

        <div>
            <h4>Jelajahi</h4>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('products.index') }}">Semua Produk</a>
            <a href="{{ route('cart.index') }}">Keranjang</a>
        </div>

        <div>
            <h4>Layanan</h4>
            <p>Produk berkualitas</p>
            <p>Belanja mudah</p>
            <p>Pesanan terpantau</p>
        </div>
    </div>

    <div class="footer-bottom">
        © {{ date('Y') }} CUTORA. All rights reserved.
    </div>
</footer>

<script src="{{ asset('js/script.js') }}"></script>

@stack('scripts')

</body>
</html>