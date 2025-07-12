<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- ✅ Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter email" required />
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" id="password" type="password" class="form-control" placeholder="Enter password" required />
                </div>

                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="text-center">
                <a href="{{ route('register') }}" class="text-decoration-none me-2">Register</a> |
                <a href="{{ route('password.request') }}" class="text-decoration-none ms-2">Forgot Password?</a>
            </div>
        </div>
    </div>

</body>
</html>
