<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- ✅ Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Register</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter full name" required />
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" required />
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Enter password" required />
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Confirm password" required />
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Already have an account? Login</a>
            </div>
        </div>
    </div>

</body>
</html>
