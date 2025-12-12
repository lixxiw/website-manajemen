<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        .vh-100 {
            height: 100vh !important;
        }
        .card {
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .registration-section {
            background-color: #f8f9fa; /* Light gray background */
        }

        /* --- CSS KUSTOM UNTUK TOGGLE PASSWORD (DISESUAIKAN DARI HALAMAN LOGIN) --- */

        /* Kontainer untuk menampung input dan ikon (penting untuk positioning ikon) */
        .password-input-container {
            position: relative;
        }
        /* Style untuk ikon toggle */
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 15px; /* Jarak dari sisi kanan input */
            top: 50%;
            /* Trik untuk menengahkan vertikal tanpa mempedulikan tinggi input */
            transform: translateY(-50%);
            z-index: 10;
            color: #6c757d;
            padding-top: 15px; /* Kompensasi untuk label di atasnya */
        }

        /* Memberi ruang di kanan input agar teks tidak tertutup ikon */
        .password-input-container .form-control {
            padding-right: 2.5rem !important;
        }

        /* Memperbaiki alignment ikon FA utama di kiri (fas fa-lock, fas fa-key) */
        .d-flex.flex-row.align-items-center .fa-fw.pt-4 {
            padding-top: 25px !important;
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

                            <div class="col-md-6 col-lg-6 col-xl-5">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" action="{{ url('/register') }}" method="POST">
                                    @csrf

                                    {{-- ALERT UNTUK PESAN SUKSES --}}
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

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                           <input
    type="text"
    name="name"
    class="form-control"
    required
    autofocus
    placeholder="enter your name"
>


                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Your Email</label>
<input
    type="email"
    id="form3Example3c"
    name="email"
    class="form-control form-control-lg"
    placeholder="Enter a valid email address"
    required
    autofocus
    pattern="[a-zA-Z0-9._%+-]{3,30}@gmail\.com"
/>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0 password-input-container">
                                            <label class="form-label" for="form3Example4c">Password</label>
<input
    type="password"
    id="form3Example4c"
    class="form-control"
    name="password"
    required
    placeholder="Enter your password"
>
                                            <span class="password-toggle" data-target="form3Example4c">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw pt-4"></i>
                                        <div class="form-group flex-fill mb-0 password-input-container">
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label>
<input
    type="password"
    id="form3Example4cd"
    class="form-control"
    name="password_confirmation"
    required
    placeholder="repeat your password"
>
                                            <span class="password-toggle" data-target="form3Example4cd">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                    <p class="text-center mt-3">
                                        Sudah memiliki akun?
                                        <a href="{{ url('/login') }}" class="fw-bold text-body"><u>Login</u></a>
                                    </p>
                                </form>

                            </div>

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua elemen dengan class password-toggle
        const toggleIcons = document.querySelectorAll('.password-toggle');

        toggleIcons.forEach(toggleIcon => {
            toggleIcon.addEventListener('click', function() {
                // Ambil ID input target dari atribut data-target
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);

                // Periksa tipe input saat ini
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';

                // Ubah tipe input
                passwordInput.setAttribute('type', type);

                // Ubah ikon (eye / eye-slash)
                const iconElement = this.querySelector('i');

                if (type === 'text') {
                    iconElement.classList.remove('fa-eye');
                    iconElement.classList.add('fa-eye-slash'); // Ikon mata tertutup
                } else {
                    iconElement.classList.remove('fa-eye-slash');
                    iconElement.classList.add('fa-eye'); // Ikon mata terbuka
                }
            });
        });
    });
</script>
</body>
</html>
