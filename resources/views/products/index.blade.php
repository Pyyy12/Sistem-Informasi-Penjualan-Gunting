@extends('layouts.app')

@section('title', 'Katalog Produk - CUTORA')

@section('content')

<section class="page-banner">
    <div class="container">
        <span class="eyebrow">CUTORA COLLECTION</span>
        <h1>Temukan gunting yang tepat.</h1>
        <p>Jelajahi berbagai pilihan produk sesuai kebutuhanmu.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <form action="{{ route('products.index') }}" method="GET" class="filter-bar">
            <div class="search-box">
                <span>⌕</span>
                <input type="text" name="search"
                       placeholder="Cari nama produk atau SKU..."
                       value="{{ request('search') }}">
            </div>

            <select name="category">
                <option value="">Semua kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(request('category') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <select name="sort">
                <option value="">Urutkan</option>
                <option value="latest" @selected(request('sort') === 'latest')>
                    Terbaru
                </option>
                <option value="lowest" @selected(request('sort') === 'lowest')>
                    Harga terendah
                </option>
                <option value="highest" @selected(request('sort') === 'highest')>
                    Harga tertinggi
                </option>
            </select>

            <button class="btn btn-primary" type="submit">Cari Produk</button>
        </form>

        <div class="catalog-heading">
            <h2>Semua Produk</h2>
            <span>{{ $products->total() }} produk ditemukan</span>
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                @include('products.partials.card', ['product' => $product])
            @empty
                <div class="empty-state">
                    <span>⌕</span>
                    <h3>Produk tidak ditemukan</h3>
                    <p>Coba gunakan kata kunci pencarian lainnya.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">
                        Reset Pencarian
                    </a>
                </div>
            @endforelse
        </div>

        <div class="pagination-wrapper">
            {{ $products->links() }}
        </div>
    </div>
</section>

@endsection