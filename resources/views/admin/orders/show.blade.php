@extends('admin.layouts.app')

@section('title', 'Detail Pesanan - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">ORDER DETAIL</span>
        <h1>{{ $order->order_number }}</h1>
        <p>Dibuat pada {{ $order->created_at->format('d F Y, H:i') }}</p>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline">
        ← Kembali
    </a>
</div>

<div class="admin-detail-grid">
    <div class="admin-panel">
        <h2>Produk Pesanan</h2>

        @foreach($order->items as $item)
            <div class="checkout-product">
                <div>
                    <strong>{{ $item->product_name }}</strong>
                    <small>{{ $item->product_sku }} · {{ $item->quantity }} × Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                </div>

                <strong>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong>
            </div>
        @endforeach

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

    <div class="admin-panel">
        <h2>Data Pelanggan</h2>

        <div class="detail-info-row">
            <span>Nama</span>
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
            <span>Catatan</span>
            <strong>{{ $order->notes ?: '-' }}</strong>
        </div>

        <hr>

        <h2>Perbarui Status</h2>

        <form action="{{ route('admin.orders.update', $order) }}"
              method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label>Status Pesanan</label>
                <select name="status" required>
                    @foreach(['pending', 'processing', 'shipped', 'completed', 'cancelled'] as $status)
                        <option value="{{ $status }}"
                            @selected($order->status === $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status Pembayaran</label>
                <select name="payment_status" required>
                    @foreach(['pending', 'paid', 'failed'] as $status)
                        <option value="{{ $status }}"
                            @selected($order->payment_status === $status)>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Simpan Status
            </button>
        </form>
    </div>
</div>
@endsection