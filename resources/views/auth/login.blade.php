<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- BOOTSTRAP 5 CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Link CSS Khusus untuk Login (Harus ada di public/assets/login.css) -->
    <link rel="stylesheet" href="{{ asset('assets/login.css') }}">
    
    <!-- Link Font Awesome untuk Ikon Media Sosial -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Style tambahan jika tidak menggunakan login.css -->
    <style>
        /* Mengatasi MDB form-outline jika tidak menggunakan MDB JS */
        /* CSS ini dipertahankan dari input Anda */
        .form-outline .form-control {
            padding-top: 1.5rem;
        }
        .form-outline .form-label {
            position: absolute;
            top: 0.5rem;
            left: 0.75rem;
            transition: all 0.2s ease-out;
            pointer-events: none;
            color: #6c757d;
        }
        .form-outline .form-control:focus ~ .form-label,
        .form-outline .form-control:not(:placeholder-shown) ~ .form-label {
            transform: translateY(-1rem) scale(0.8);
            background-color: white;
            padding: 0 0.25rem;
            z-index: 10;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        /* Tambahkan style untuk divider jika belum ada */
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                
                <!-- Kiri: Gambar -->
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
                </div>
                
                <!-- Kanan: Form Login -->
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf <!-- Token CSRF wajib di Laravel -->

                        {{-- ALERT BOX for Login Error --}}
                        {{-- Laravel biasanya menggunakan $errors->has('email') untuk kegagalan login --}}
                        @if ($errors->has('email'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Login Failed:</strong> {{ $errors->first('email') }} 
                            </div>
                        {{-- Atau jika menggunakan pesan flash generik (contoh: status/error) --}}
                        @elseif (session('status'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Error:</strong> {{ session('status') }} 
                            </div>
                        @endif
                        {{-- END ALERT BOX --}}

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mt-4">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <!-- Tombol Sosial -->
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <H5>EMAIL:</H5>
                            <input 
                                type="email" 
                                id="emailInput" 
                                name="email"
                                class="form-control form-control-lg"
                                placeholder="Enter a valid email address"
                                required
                            />
                            <label class="form-label" for="emailInput"></label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <h5>Password:</h5>
                            <input 
                                type="password" 
                                id="passwordInput" 
                                name="password"
                                class="form-control form-control-lg"
                                placeholder="Enter password"
                                required
                            />
                            <label class="form-label" for="passwordInput"></label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox Remember Me -->
                            <div class="form-check mb-0">
                                <input 
                                    class="form-check-input me-2" 
                                    type="checkbox" 
                                    name="remember"
                                    id="remember" 
                                />
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="link-danger">Register</a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
            <!-- Right (Media Sosial) -->
            <div>
                <a href="#!" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                <a href="#!" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                <a href="#!" class="text-white me-4"><i class="fab fa-google"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </section>

    <!-- BOOTSTRAP 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>