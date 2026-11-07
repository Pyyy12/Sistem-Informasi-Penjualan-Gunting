@extends('layouts.app')

@section('title', 'CUTORA - Premium Scissors Store')

@section('content')

<section class="hero-section">
    <div class="container hero-grid">
        <div class="hero-content">
            <span class="eyebrow">PRECISION IN EVERY CUT</span>

            <h1>
                Potongan sempurna,
                <span>dimulai dari alat yang tepat.</span>
            </h1>

            <p>
                Temukan koleksi gunting berkualitas untuk kebutuhan
                rumah tangga, kantor, kerajinan, hingga profesional.
            </p>

            <div class="hero-actions">
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-large">
                    Jelajahi Produk <span>→</span>
                </a>

                <a href="#keunggulan" class="btn btn-text">
                    Kenali CUTORA
                </a>
            </div>

            <div class="hero-stat">
                <div>
                    <strong>100%</strong>
                    <span>Produk berkualitas</span>
                </div>
                <div>
                    <strong>5+</strong>
                    <span>Kategori produk</span>
                </div>
                <div>
                    <strong>Easy</strong>
                    <span>Belanja online</span>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-image-card">
                <div class="hero-image-placeholder">✂</div>
                <div class="hero-image-caption">
                    <span>COLLECTION 2026</span>
                    <strong>Tools made for precision.</strong>
                </div>
            </div>

            <div class="floating-card">
                <span class="floating-icon">✦</span>
                <div>
                    <strong>Premium Quality</strong>
                    <small>Detail yang terasa berbeda</small>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="benefit-section" id="keunggulan">
    <div class="container benefit-grid">
        <div class="benefit-item">
            <span>✦</span>
            <div>
                <strong>Kualitas Pilihan</strong>
                <small>Produk dipilih dengan cermat</small>
            </div>
        </div>

        <div class="benefit-item">
            <span>◇</span>
            <div>
                <strong>Desain Ergonomis</strong>
                <small>Nyaman untuk digunakan</small>
            </div>
        </div>

        <div class="benefit-item">
            <span>✓</span>
            <div>
                <strong>Belanja Praktis</strong>
                <small>Pemesanan mudah dan cepat</small>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">OUR COLLECTION</span>
                <h2>Jelajahi Kategori</h2>
                <p>Temukan gunting sesuai kebutuhanmu.</p>
            </div>

            <a href="{{ route('products.index') }}" class="text-link">
                Semua produk →
            </a>
        </div>

        <div class="category-grid">
            @foreach($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->id]) }}"
                   class="category-card">
                    <span class="category-icon">✂</span>
                    <h3>{{ $category->name }}</h3>
                    <p>{{ $category->products_count }} produk</p>
                    <span class="category-arrow">↗</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section products-section">
    <div class="container">
        <div class="section-heading">
            <div>
                <span class="eyebrow">HANDPICKED FOR YOU</span>
                <h2>Produk Pilihan</h2>
                <p>Produk favorit untuk menunjang aktivitas sehari-hari.</p>
            </div>

            <a href="{{ route('products.index') }}" class="text-link">
                Lihat semua →
            </a>
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                @include('products.partials.card', ['product' => $product])
            @empty
                <p>Belum ada produk tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container cta-content">
        <div>
            <span class="eyebrow">MAKE THE RIGHT CHOICE</span>
            <h2>Alat yang tepat membuat setiap pekerjaan lebih mudah.</h2>
            <p>Temukan koleksi lengkap CUTORA sekarang.</p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-light btn-large">
            Belanja Sekarang →
        </a>
    </div>
</section>

@endsection