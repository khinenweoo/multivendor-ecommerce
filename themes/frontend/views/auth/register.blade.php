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
                                 <a href="#">Create Account</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
             </div>
        </div>
    </div>
     <!-- End Breadcrumbs -->
<section class="register_content">
    <div class="container">
        <div class="row center-block">
            <div class="col-md-12 col-sm-12">
                <div class="register_wrapper">
                    <div class="title-text">
                        <h2>Create Account</h2>
                        <p>If you are new to our marketplace, we glad to have you as member.</p>
                    </div>
                    <div class="register_form">
                        <form method="POST" action="{{ route('user.create') }}">
                            @csrf
                            <input type="hidden" name="input" value="">
                            <div class="form-group @error('fullname') has-error @enderror row">
                                
                                <label for="name" class="col-md-4 col-form-label text-md-right required">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group @error('email') has-error @enderror row">
                                <label for="email" class="col-md-4 col-form-label text-md-right required">{{ __('E-Mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
    
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right required">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback btn-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right required">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group @error('phone') has-error @enderror row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control " name="phone" value="{{ old('phone') }}" required autocomplete="off">
    
                                    @error('phone')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="form-group @error('country') has-error @enderror row">
                                <label for="country_option" class="col-md-4 col-form-label text-md-right required">{{ __('Country') }}</label>
    
                                <div class="col-md-6">
                                    <select name="address[country]" id="country_select" class="country_select">
                                        <option value="">Select Country</option>
                                        <option value="">Austria</option>
                                        <option value="">Bangladesh</option>
                                        <option value="">Belgium</option>
                                        <option value="">Benin</option>
                                        <option value="">Boston</option>
                                        <option value="">Brunei</option>
                                        <option value="">Cambodia</option>
                                        <option value="">Canada</option>
                                        <option value="">Columbia</option>
                                    </select>
                                    @error('country')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div> -->
    
                            <!-- <div class="form-group @error('city') has-error @enderror row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
    
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control " name="city" value="{{ old('city') }}" autocomplete="off">
    
                                    @error('city')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div> -->
                            <!-- <div class="form-group @error('address') has-error @enderror row">
                                <label for="email" class="col-md-4 col-form-label text-md-right required">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control " name="address" value="{{ old('address') }}" required autocomplete="off">
    
                                    @error('address')
                                        <span class="form-control-hint" role="alert">
                                            <strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div> -->
                            <div class="register-policy">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <p class="policy_text">By clicking Create Account, you acknowledge you have read and agreed to our <a href="" target="_blank" rel="noopener" aria-label="Terms of use, Opens in a new tab">Terms of Use </a> and <a href="http://corporate.walmart.com/privacy-security/walmart-privacy-policy" target="_blank" rel="noopener" aria-label="Privacy policy, Opens in a new tab">Privacy Policy</a>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn create-btn">
                                        {{ __('Create Account') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
@endsection