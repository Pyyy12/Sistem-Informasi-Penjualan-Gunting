<div class="product-card">
    <a href="{{ route('products.show', $product->slug) }}" class="product-image">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}">
        @else
            <div class="product-placeholder">✂</div>
        @endif

        @if($product->stock <= 0)
            <span class="product-badge badge-out">Habis</span>
        @else
            <span class="product-badge">Tersedia</span>
        @endif
    </a>

    <div class="product-info">
        <span class="product-category">
            {{ $product->category?->name ?? 'Koleksi CUTORA' }}
        </span>

        <h3>
            <a href="{{ route('products.show', $product->slug) }}">
                {{ $product->name }}
            </a>
        </h3>

        <div class="product-bottom">
            <strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong>

            <a href="{{ route('products.show', $product->slug) }}"
               class="product-arrow">↗</a>
        </div>
    </div>
</div>