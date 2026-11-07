@extends('admin.layouts.app')

@section('title', 'Tambah Kategori - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">CATEGORY MANAGEMENT</span>
        <h1>Tambah Kategori</h1>
        <p>Buat kategori baru untuk produk.</p>
    </div>
</div>

<div class="admin-panel form-admin-panel">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        @include('admin.categories.form')

        <div class="form-actions">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Kategori</button>
        </div>
    </form>
</div>
@endsection