<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (for icons like fas fa-user) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <style>
        /* Menggunakan Tailwind CSS untuk styling tambahan, meskipun sebagian besar sudah Bootstrap */
        .vh-100 {
            height: 100vh !important;
        }
        .card {
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        /* Style kustom untuk section background */
        .registration-section {
            background-color: #f8f9fa; /* Light gray background */
        }
    </style>
</head>
<body>

<section class="vh-100 registration-section">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            
                            <!-- FORM: Diberi lebar 6 kolom pada md, lg, xl. -->
                            <div class="col-md-6 col-lg-6 col-xl-5">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" action="{{ url('/register') }}" method="POST">
                                    @csrf 

                                    {{-- ALERT UNTUK PESAN SUKSES (Setelah redirect dengan with('success')) --}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    {{-- ALERT UNTUK SEMUA KESALAHAN VALIDASI --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Registration Failed:</strong> Please correct the following errors:
                                            <ul class="mb-0 mt-1">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <!-- Your Name -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                            <input type="text" id="form3Example1c" class="form-control" name="name" required value="{{ old('name') }}" />
                                        </div>
                                    </div>

                                    <!-- Your Email -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <input type="email" id="form3Example3c" class="form-control" name="email" required value="{{ old('email') }}" />
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <input type="password" id="form3Example4c" class="form-control" name="password" required />
                                        </div>
                                    </div>

                                    <!-- Repeat your password -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
                                            <input type="password" id="form3Example4cd" class="form-control" name="password_confirmation" required />
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>

                            </div>
                            
                            <!-- IMAGE: Diberi lebar 6 kolom pada md, lg, xl. -->
                            <div class="col-md-6 col-lg-6 col-xl-7 d-flex align-items-center">
                                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS Bundle (wajib untuk dismissible alert) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>