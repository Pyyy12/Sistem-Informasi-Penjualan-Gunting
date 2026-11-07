@extends('layouts.app')

@section('title', 'Pesanan Saya - CUTORA')

@section('content')
<section class="page-banner">
    <div class="container">
        <span class="eyebrow">ORDER HISTORY</span>
        <h1>Pesanan Saya</h1>
        <p>Pantau semua transaksi dan status pesananmu.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @forelse($orders as $order)
            <div class="order-card">
                <div class="order-card-header">
                    <div>
                        <small>Nomor Pesanan</small>
                        <strong>{{ $order->order_number }}</strong>
                    </div>

                    <span class="status status-{{ $order->status }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <div class="order-card-body">
                    <div>
                        <small>Tanggal Pesanan</small>
                        <strong>{{ $order->created_at->format('d M Y, H:i') }}</strong>
                    </div>

                    <div>
                        <small>Total Pembayaran</small>
                        <strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong>
                    </div>

                    <div>
                        <small>Pembayaran</small>
                        <strong>{{ ucfirst($order->payment_status) }}</strong>
                    </div>

                    <a href="{{ route('orders.show', $order) }}"
                       class="btn btn-outline">
                        Detail Pesanan →
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <span>▤</span>
                <h2>Belum ada pesanan</h2>
                <p>Pesanan yang kamu buat akan muncul di sini.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    Mulai Belanja
                </a>
            </div>
        @endforelse

        {{ $orders->links() }}
    </div>
</section>
@endsection