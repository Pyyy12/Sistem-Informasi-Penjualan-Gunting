@extends('admin.layouts.app')

@section('title', 'Dashboard Admin - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">OVERVIEW</span>
        <h1>Dashboard</h1>
        <p>Selamat datang kembali. Berikut ringkasan toko CUTORA.</p>
    </div>

    <span class="date-label">{{ now()->format('d F Y') }}</span>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">✂</div>
        <span>Total Produk</span>
        <strong>{{ number_format($totalProducts) }}</strong>
        <small>Produk terdaftar</small>
    </div>

    <div class="stat-card">
        <div class="stat-icon">▤</div>
        <span>Total Kategori</span>
        <strong>{{ number_format($totalCategories) }}</strong>
        <small>Kategori produk</small>
    </div>

    <div class="stat-card">
        <div class="stat-icon">▣</div>
        <span>Total Pesanan</span>
        <strong>{{ number_format($totalOrders) }}</strong>
        <small>Pesanan pelanggan</small>
    </div>

    <div class="stat-card">
        <div class="stat-icon">♙</div>
        <span>Total Pelanggan</span>
        <strong>{{ number_format($totalCustomers) }}</strong>
        <small>Akun pelanggan</small>
    </div>
</div>

<div class="revenue-card">
    <div>
        <span>Total Pendapatan</span>
        <h2>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
        <p>Akumulasi pesanan dengan pembayaran berstatus lunas.</p>
    </div>
    <span class="revenue-icon">↗</span>
</div>

<div class="admin-panel">
    <div class="panel-heading">
        <div>
            <h2>Pesanan Terbaru</h2>
            <p>Daftar transaksi yang baru masuk.</p>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="text-link">
            Semua pesanan →
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestOrders as $order)
                    <tr>
                        <td><strong>{{ $order->order_number }}</strong></td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>
                            <span class="status status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="table-action">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="table-empty">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection