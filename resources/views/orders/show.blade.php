@extends('layouts.app')

@section('title', 'Detail Pesanan - CUTORA')

@section('content')
<section class="page-banner">
    <div class="container">
        <span class="eyebrow">ORDER DETAIL</span>
        <h1>Detail Pesanan</h1>
        <p>{{ $order->order_number }}</p>
    </div>
</section>

<section class="section">
    <div class="container order-detail-layout">
        <div class="form-panel">
            <h2>Produk yang Dipesan</h2>

            @foreach($order->items as $item)
                <div class="checkout-product">
                    <div>
                        <strong>{{ $item->product_name }}</strong>
                        <small>{{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                    </div>

                    <strong>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong>
                </div>
            @endforeach

            <hr>

            <div class="summary-line">
                <span>Subtotal</span>
                <strong>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</strong>
            </div>

            <div class="summary-line">
                <span>Pengiriman</span>
                <strong>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</strong>
            </div>

            <div class="summary-total">
                <span>Total</span>
                <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
            </div>
        </div>

        <div class="form-panel">
            <h2>Informasi Pesanan</h2>

            <div class="detail-info-row">
                <span>Nomor Pesanan</span>
                <strong>{{ $order->order_number }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Nama Penerima</span>
                <strong>{{ $order->customer_name }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Telepon</span>
                <strong>{{ $order->phone }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Alamat</span>
                <strong>{{ $order->address }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Metode Pembayaran</span>
                <strong>{{ strtoupper($order->payment_method) }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Status Pembayaran</span>
                <strong>{{ ucfirst($order->payment_status) }}</strong>
            </div>

            <div class="detail-info-row">
                <span>Status Pesanan</span>
                <strong>{{ ucfirst($order->status) }}</strong>
            </div>
        </div>
    </div>
</section>
@endsection