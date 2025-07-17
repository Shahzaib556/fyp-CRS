<label>Name:</label>
<input type="text" name="name" value="{{ old('name', $car->name ?? '') }}" required><br>

<label>Model:</label>
<input type="text" name="model" value="{{ old('model', $car->model ?? '') }}" required><br>

<label>Year:</label>
<input type="number" name="year" value="{{ old('year', $car->year ?? '') }}" required><br>

<label>Price/Day ($):</label>
<input type="text" name="price_per_day" value="{{ old('price_per_day', $car->price_per_day ?? '') }}" required><br>

<label>Status:</label>
<select name="status" required>
    <option value="available" {{ old('status', $car->status ?? '') == 'available' ? 'selected' : '' }}>Available</option>
    <option value="unavailable" {{ old('status', $car->status ?? '') == 'unavailable' ? 'selected' : '' }}>Unavailable</option>
</select><br>

<label>Image:</label>
<input type="file" name="image"><br>

@if(isset($car) && $car->image)
    <img src="{{ asset('storage/' . $car->image) }}" width="100"><br>
@endif
