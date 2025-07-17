<!DOCTYPE html>
<html>
<head><title>Edit Car</title></head>
<body>
    <h2>Edit Car - {{ $car->name }}</h2>
    <form method="POST" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('cars.form')
        <button type="submit">Update Car</button>
    </form>
    <a href="{{ route('cars.index') }}">Back</a>
</body>
</html>
