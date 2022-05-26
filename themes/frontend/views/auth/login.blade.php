@extends('layouts.app')

@section('content')
<main class="main-content" id="page-content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb-section">
        <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12 col-sm-12">
                     <nav class="breadcrumb">
                         <ul>
                             <li class="nav-item">
                                 <a href="" class="permal-link">Home</a>
                             </li>
                             <li class="nav-item">
                                 <a href="#">Sign In</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
        </div>
    </div>
     <!-- End Breadcrumbs -->
<section class="login_content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                
                <div class="signInWrap form-box">
                    <h2 id="login-title" class="fv col-md-10 mx-auto">Login With Email</h2>

    
                    <div class="signInform">
        
                        <form method="POST" action="{{ route('user.check') }}" autocomplete="off">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($message = Session::get('fail'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                            @csrf

                            <div class="form-group row mx-auto">

                                <div class="col-md-12 col-12">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mx-auto">

                                <div class="col-md-12 col-12">
                                    <input id="password" type="password" placeholder="Password (8+ characters)" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autocorrect="off">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mx-auto">
                                <div class="col-md-12 col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-0 form-group row mx-auto">
                                <div class="col-md-12 col-12">
                                    <button type="submit" class="btn signIn-btn">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link forgot-pw-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                    </form>
                    </div>



                </div>

            </div>
            <div class="col-sm-12 col-md-6 col-lg-6" >
               <div class="createAccountWrap form-box">
                    <div class="row">
                        <div class="col-md-11 mx-auto">
                        <h2 id="register-title" class="fv"><svg class="fx" width="24" height="24" viewBox="0 0 24 24" stroke="#2F3337" fill="#2F3337"><title>User Add</title><path d="M9 12c2.761 0 5-3.239 5-6V5A5 5 0 004 5v1c0 2.761 2.239 6 5 6zM16.257 15.315c-.093-.043-.184-.088-.283-.121C14.329 14.638 11.824 14 9 14s-5.329.638-6.974 1.193A2.99 2.99 0 000 18.032V22h14.349A5.97 5.97 0 0114 20c0-1.897.883-3.586 2.257-4.685zM21 16h-2v3h-3v2h3v3h2v-3h3v-2h-3v-3z" stroke="none" fill="inherit"></path></svg>Create an Account</h2>
                        <div class="extra-indent-bottom mb-4">
                            <p>By creating an account with us and you'll be able to
                            <ul>
                            <li>Checkout faster</li>
                            <li>Access your order history</li>
                            <li>Track new orders</li>
                            <li>Save items to your wishlist</li>
                            </ul>
                           
                        </div>
                        <div class="register-wrap">
                            <a class="btn register-btn" href="{{ route('user.register') }}">
                            CREATE AN ACCOUNT
                            </a>
                        </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>
</section>


</main>
@endsection