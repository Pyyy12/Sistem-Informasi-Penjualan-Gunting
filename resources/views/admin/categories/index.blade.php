@extends('admin.layouts.app')

@section('title', 'Kategori - CUTORA')

@section('content')
<div class="admin-page-heading">
    <div>
        <span class="eyebrow">CATEGORY MANAGEMENT</span>
        <h1>Kategori Produk</h1>
        <p>Kelola pengelompokan produk CUTORA.</p>
    </div>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        + Tambah Kategori
    </a>
</div>

<div class="admin-panel">
    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Jumlah Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->products_count }} produk</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('admin.categories.edit', $category) }}"
                                   class="table-action">Edit</a>

                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus kategori ini?')">
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
                        <td colspan="4" class="table-empty">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $categories->links() }}
</div>
@endsection