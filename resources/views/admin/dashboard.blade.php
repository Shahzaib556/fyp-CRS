<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h2 class="mb-4">Welcome, {{ auth()->user()->name }}</h2>

                <p class="text-muted">This is your admin panel. Use the navigation to manage cars, bookings, and users.</p>

                <!-- Add more dashboard widgets or links here -->
                <a href="/admin/cars" class="btn btn-primary me-2">Manage Cars</a>
                <a href="/admin/bookings" class="btn btn-success me-2">Manage Bookings</a>
                <a href="/admin/users" class="btn btn-info">Manage Users</a>
            </div>
        </div>
    </div>

</body>
</html>
