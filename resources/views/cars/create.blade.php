<!DOCTYPE html>
<html>
<head><title>Add Car</title></head>
<body>
    <h2>Add New Car</h2>
    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf
        @include('cars.form')
        <button type="submit">Add Car</button>
    </form>
    <a href="{{ route('cars.index') }}">Back</a>
</body>
</html>
