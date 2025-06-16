<div class="mb-3">
    <label>Name:</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Category:</label>
    <input type="text" name="category" class="form-control" value="{{ old('category', $product->category ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Description:</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Price:</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Old Price:</label>
    <input type="number" step="0.01" name="old_price" class="form-control" value="{{ old('old_price', $product->old_price ?? '') }}"> 
</div>

<div class="mb-3">
    <label>Stock:</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? 0) }}" required>
</div>

<div class="mb-3">
    <label>Rating:</label>
    <input type="number" step="0.1" name="rating" class="form-control" value="{{ old('rating', $product->rating ?? 0) }}">
</div>

<div class="mb-3">
    <label>Image:</label>
    <input type="file" name="image" class="form-control">
    @if (!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
    @endif
</div>
