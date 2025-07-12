<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <!-- ✅ Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow p-4" style="max-width: 600px; margin: auto;">
            <h3 class="mb-4 text-center">User Profile</h3>

            <div class="mb-3">
                <strong>Name:</strong> {{ $user->name }}
            </div>

            <div class="mb-3">
                <strong>Email:</strong> {{ $user->email }}
            </div>

            <div class="mb-3">
                <strong>Phone:</strong> {{ $user->phone ?? 'N/A' }}
            </div>

            <div class="mb-3">
                <strong>Address:</strong> {{ $user->address ?? 'N/A' }}
            </div>

            <div class="mb-3">
                <strong>Document:</strong>
                @if ($user->document_path)
                    <a href="{{ asset('storage/' . $user->document_path) }}" target="_blank">View Document</a>
                @else
                    Not uploaded
                @endif
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>

</body>
</html>
