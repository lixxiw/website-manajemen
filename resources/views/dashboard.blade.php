<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>

    {{-- BOOTSTRAP 5 CSS via CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- DATATABLES CSS (Bootstrap 5 Style) --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    
    @stack('styles')

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="#">Navbar</a>
            
            <!-- Tombol Toggler (untuk mobile) -->
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <!-- KIRI: Item Navigasi -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    
                    <!-- DROPDOWN YANG DIPERBAIKI (Bootstrap 5 attributes) -->
                    <li class="nav-item dropdown">
                        <a 
                            class="nav-link dropdown-toggle" 
                            href="#" 
                            id="navbarDropdown" 
                            role="button" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false"
                        >
                            Keuangan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="bukubesar">BUKU BESAR</a></li>
                            <li><a class="dropdown-item" href="#">NERACA</a></li>
                             <li><a class="dropdown-item" href="#">LABA RUGI</a></li>
                            <li><a class="dropdown-item" href="#">ARUS KAS</a></li>
                             <li><a class="dropdown-item" href="#">TRIAL BALANCE</a></li>
          
                            <!-- Menggunakan <li> untuk pembagi -->
                            <li><hr class="dropdown-divider"></li> 
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- KANAN: Form Search (Dibuat sesuai B5) -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    
    <!-- Konten utama akan masuk di sini jika ini adalah layout utama -->
    <div class="container mt-4">
        @yield('content')
    </div>
    
{{-- JQUERY dan BOOTSTRAP JS --}}
    <!-- JQuery diletakkan sebelum Bootstrap untuk kompatibilitas DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> 
    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- DATATABLES JS --}}
    <script src="https://cdn.datatables.net/2.0.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    @stack('scripts')
</body>
</html>