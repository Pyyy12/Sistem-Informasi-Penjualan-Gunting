@extends('layouts.app')

@section('title', 'Keranjang Belanja - CUTORA')

@section('content')
<section class="page-banner">
    <div class="container">
        <span class="eyebrow">YOUR SHOPPING CART</span>
        <h1>Keranjang Belanja</h1>
        <p>Periksa kembali produk pilihanmu sebelum checkout.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @if(count($cart))
            <div class="cart-layout">
                <div class="cart-items">
                    @foreach($cart as $id => $item)
                        <div class="cart-item">
                            <div class="cart-item-image">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}"
                                         alt="{{ $item['name'] }}">
                                @else
                                    <span>✂</span>
                                @endif
                            </div>

                            <div class="cart-item-info">
                                <h3>{{ $item['name'] }}</h3>
                                <strong>
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </strong>

                                <form action="{{ route('cart.update', $id) }}"
                                      method="POST" class="cart-quantity-form">
                                    @csrf
                                    @method('PATCH')

                                    <input type="number" name="quantity"
                                           value="{{ $item['quantity'] }}"
                                           min="1" required>

                                    <button type="submit" class="text-link">
                                        Perbarui
                                    </button>
                                </form>
                            </div>

                            <div class="cart-item-total">
                                <strong>
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </strong>

                                <form action="{{ route('cart.remove', $id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="remove-link" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <aside class="cart-summary">
                    <h2>Ringkasan Belanja</h2>

                    <div class="summary-line">
                        <span>Total item</span>
                        <strong>{{ count($cart) }} produk</strong>
                    </div>

                    <div class="summary-line">
                        <span>Subtotal</span>
                        <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </div>

                    <div class="summary-total">
                        <span>Total sementara</span>
                        <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </div>

                    <a href="{{ route('checkout.index') }}"
                       class="btn btn-primary btn-block">
                        Lanjut ke Checkout →
                    </a>

                    <a href="{{ route('products.index') }}" class="continue-shopping">
                        ← Lanjut Belanja
                    </a>
                </aside>
            </div>
        @else
            <div class="empty-state">
                <span>🛒</span>
                <h2>Keranjang masih kosong</h2>
                <p>Yuk, temukan produk gunting favoritmu.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </div>
</section>
@endsection