@extends('admin.layouts.app')

@section('title', 'Tambah Produk - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">PRODUCT MANAGEMENT</span>
        <h1>Tambah Produk</h1>
        <p>Masukkan informasi produk baru.</p>
    </div>

    <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
        ← Kembali
    </a>
</div>

<div class="admin-panel form-admin-panel">
    <form action="{{ route('admin.products.store') }}"
          method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.products.form', ['product' => null])

        <div class="form-actions">
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline">
                Batal
            </a>
            <button type="submit" class="btn btn-primary">
                Simpan Produk
            </button>
        </div>
    </form>
</div>
@endsection