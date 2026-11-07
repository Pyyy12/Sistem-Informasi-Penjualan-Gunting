@extends('admin.layouts.app')

@section('title', 'Kelola Produk - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">INVENTORY MANAGEMENT</span>
        <h1>Kelola Produk</h1>
        <p>Atur katalog, harga, stok, dan informasi produk.</p>
    </div>

    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>SKU</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <div class="table-product">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="{{ $product->name }}">
                                @else
                                    <span>✂</span>
                                @endif

                                <strong>{{ $product->name }}</strong>
                            </div>
                        </td>

                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->category?->name ?? '-' }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>

                        <td>
                            <span class="status {{ $product->is_active ? 'status-completed' : 'status-cancelled' }}">
                                {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>

                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="table-action">Edit</a>

                                <form action="{{ route('admin.products.destroy', $product) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="table-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="table-empty">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $products->links() }}
</div>
@endsection