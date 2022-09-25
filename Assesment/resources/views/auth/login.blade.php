<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="{{asset('backend/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                        <!-- Session Status -->
                                          <x-auth-session-status class="mb-4" :status="session('status')" />

                                            <!-- Validation Errors -->
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                           <!-- Email Address -->
                                            <div class="form-group">
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" placeholder="example@gmail.com" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>
                                            <!-- Password -->
                                                <div class="mt-4 form-group">
                                                    <x-label for="password" :value="__('Password')" />

                                                    <x-input id="password" placeholder="Enter Your Password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                                                </div>
                                             <!-- Remembar me -->
                                             <div class="form-check mb-3">
                                                 <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                 <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                             </div>
                                             <!-- Forgot password -->
                                             <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                             @if (Route::has('password.request'))
                                                 <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                             @endif   
                                             <button type="submit" class="btn btn-info btn-block">Sign In</button>
                                             </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{Route('register')}}">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/scripts.js')}}"></script>
    </body>
</html>
