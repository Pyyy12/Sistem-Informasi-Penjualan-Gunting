<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="name"
           value="{{ old('name', $category->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Deskripsi</label>
    <textarea name="description" rows="4">{{ old('description', $category->description ?? '') }}</textarea>
</div>