<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }
        .card {
            border-radius: 1.25rem;
        }
        .brand-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6 col-lg-5">

        <div class="card shadow p-4">

            <div class="text-center mb-4">
                <span class="brand-text">Reset Password</span>
                <p class="text-muted mt-2">
                    Enter your new password below
                </p>
            </div>

            {{-- ERROR MESSAGE --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control form-control-lg"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">New Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg"
                        placeholder="Enter new password"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control form-control-lg"
                        placeholder="Re-enter new password"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    Reset Password
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        ← Back to Login
                    </a>
                </div>

            </form>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
