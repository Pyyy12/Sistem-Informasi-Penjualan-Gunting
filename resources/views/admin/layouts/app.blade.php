<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin CUTORA')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">

<div class="admin-layout">
    <aside class="admin-sidebar" id="adminSidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand admin-brand">
            <span class="brand-icon">C</span>
            <span>CUTORA<span class="brand-dot">.</span></span>
        </a>

        <div class="sidebar-caption">MENU UTAMA</div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span>▦</span> Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <span>✂</span> Produk
            </a>

            <a href="{{ route('admin.categories.index') }}"
               class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <span>▤</span> Kategori
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <span>▣</span> Pesanan
            </a>
        </nav>

        <div class="sidebar-bottom">
            <a href="{{ route('home') }}">↗ Lihat Website</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">⇥ Keluar</button>
            </form>
        </div>
    </aside>

    <div class="admin-main">
        <header class="admin-topbar">
            <button class="admin-menu-toggle" id="adminMenuToggle">☰</button>

            <div>
                <strong>Administrator</strong>
                <small>Kelola toko CUTORA</small>
            </div>

            <div class="admin-profile">
                <span class="admin-avatar">A</span>
                <div>
                    <strong>{{ auth()->user()->name }}</strong>
                    <small>Administrator</small>
                </div>
            </div>
        </header>

        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>