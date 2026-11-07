<div class="admin-form-grid">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="name"
               value="{{ old('name', $product?->name) }}" required>
    </div>

    <div class="form-group">
        <label>SKU</label>
        <input type="text" name="sku"
               value="{{ old('sku', $product?->sku) }}" required>
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id">
            <option value="">Tanpa kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @selected(old('category_id', $product?->category_id) == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="price" min="0" step="0.01"
               value="{{ old('price', $product?->price) }}" required>
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stock" min="0"
               value="{{ old('stock', $product?->stock ?? 0) }}" required>
    </div>

    <div class="form-group">
        <label>Foto Produk</label>
        <input type="file" name="image" accept="image/*">
        @if($product?->image)
            <img class="form-preview"
                 src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}">
        @endif
    </div>

    <div class="form-group full-width">
        <label>Deskripsi Produk</label>
        <textarea name="description" rows="5">{{ old('description', $product?->description) }}</textarea>
    </div>

    <div class="form-group full-width">
        <label class="checkbox-label">
            <input type="checkbox" name="is_active" value="1"
                @checked(old('is_active', $product?->is_active ?? true))>
            Produk aktif dan dapat ditampilkan di katalog
        </label>
    </div>
</div>