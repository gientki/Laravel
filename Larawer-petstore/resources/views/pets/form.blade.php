<div class="mb-3">
    <label for="name" class="form-label">Nazwa</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $pet->name ?? '') }}">
    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-select">
        @foreach(['available', 'pending', 'sold'] as $status)
            <option value="{{ $status }}" {{ (old('status', $pet->status ?? '') == $status) ? 'selected' : '' }}>
                {{ ucfirst($status) }}
            </option>
        @endforeach
    </select>
    @error('status') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Kategoria</label>
    <input type="text" name="category" class="form-control" value="{{ old('category', $pet->category ?? '') }}">
</div>

<div class="mb-3">
    <label for="photo_url" class="form-label">URL zdjęcia</label>
    <input type="url" name="photo_url" class="form-control" value="{{ old('photo_url', $pet->photo_url ?? '') }}">
</div>

<div class="mb-3">
    <label for="tags" class="form-label">Tagi (oddzielone przecinkami)</label>
    <input type="text" name="tags" class="form-control" value="{{ old('tags', $pet->tags ?? '') }}">
</div>
