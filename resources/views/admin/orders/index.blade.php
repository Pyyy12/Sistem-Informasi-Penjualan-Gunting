@extends('admin.layouts.app')

@section('title', 'Pesanan - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">ORDER MANAGEMENT</span>
        <h1>Pesanan Pelanggan</h1>
        <p>Periksa transaksi dan proses pesanan pelanggan.</p>
    </div>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nomor Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Pembayaran</th>
                    <th>Status Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td><strong>{{ $order->order_number }}</strong></td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($order->payment_status) }}</td>
                        <td>
                            <span class="status status-{{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}"
                               class="table-action">Kelola</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="table-empty">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $orders->links() }}
</div>
@endsection