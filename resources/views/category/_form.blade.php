<div class="mb-3">
    <label for="name" class="form-label">Nama Kategori</label>
    <input type="text" id="name" name="name" value="{{ old('name', $name ?? '') }}"
        class="form-control @error('name') is-invalid @enderror">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
