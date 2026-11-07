@extends('admin.layouts.app')

@section('title', 'Edit Produk - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">PRODUCT MANAGEMENT</span>
        <h1>Edit Produk</h1>
        <p>Perbarui informasi produk {{ $product->name }}.</p>
    </div>

    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
        ← Kembali
    </a>
</div>

<div class="admin-panel form-admin-panel">
    <form action="{{ route('admin.products.update', $product) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.products.form', ['product' => $product])

        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection