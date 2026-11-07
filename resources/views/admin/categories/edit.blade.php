@extends('admin.layouts.app')

@section('title', 'Edit Kategori - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">CATEGORY MANAGEMENT</span>
        <h1>Edit Kategori</h1>
        <p>Perbarui informasi kategori.</p>
    </div>
</div>

<div class="admin-panel form-admin-panel">
    <form action="{{ route('admin.categories.update', $category) }}"
          method="POST">
        @csrf
        @method('PUT')

        @include('admin.categories.form', ['category' => $category])

        <div class="form-actions">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection