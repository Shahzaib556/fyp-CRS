<!DOCTYPE html>
<html>
<head><title>Car List</title></head>
<body>
    <h2>All Cars</h2>

    <a href="{{ route('cars.create') }}">+ Add Car</a>

    <table border="1">
        <thead>
            <tr>
                <th>Image</th><th>Name</th><th>Model</th><th>Year</th>
                <th>Price/Day</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                <td>
                    @if($car->image)
                        <img src="{{ asset('storage/'.$car->image) }}" width="100">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>${{ $car->price_per_day }}</td>
                <td>{{ ucfirst($car->status) }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car) }}">Edit</a>
                    <form method="POST" action="{{ route('cars.destroy', $car) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this car?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
