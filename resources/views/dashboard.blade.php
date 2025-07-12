<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary px-4">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm" type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Welcome, {{ auth()->user()->name }}</h2>
            <p class="text-muted">You are now logged in to your dashboard. You can view and manage your bookings here.</p>

            <!-- Add more widgets or links -->
            <a href="/user/bookings" class="btn btn-primary me-2">View Bookings</a>
            <a href="/cars" class="btn btn-secondary">Book a Car</a>
        </div>
    </div>

</body>
</html>
