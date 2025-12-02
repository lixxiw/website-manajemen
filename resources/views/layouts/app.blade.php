<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Keuangan Laravel</title>

    {{-- BOOTSTRAP 5 CSS via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- DATATABLES CSS (Bootstrap 5 Style) --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    
    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">

            <!-- Brand / Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-coins me-2"></i> ok
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Tombol Login/Otentikasi -->
                <div class="ms-auto d-flex">

                    @auth
                        {{-- Jika user sudah login --}}
                        <span class="navbar-text me-3 text-white">
                            Selamat Datang, {{ Auth::user()->name }}
                        </span>

                        <!-- FORM Logout (POST) -->
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt me-1"></i> Logout
                            </button>
                        </form>

                    @else
                        {{-- Jika user belum login --}}
                        <a class="btn btn-light" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i> Login
                        </a>
                    @endauth

                </div>
                <!-- Akhir Tombol Login/Otentikasi -->

            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    {{-- JQUERY dan BOOTSTRAP JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- DATATABLES JS --}}
    <script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>
