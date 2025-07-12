<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <!-- ✅ Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Forgot Password</h3>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Enter your email" required />
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary">Send Reset Link</button>
                </div>
            </form>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
            </div>
        </div>
    </div>

</body>
</html>
