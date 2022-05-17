@extends('layouts.app')
@section('content')
    <div class="offset-80">
        <div class="error-wrapper">
            <img src="" alt="">
            <h1 class="block-title">Please login or register!</h1>
            <div class="description">
                Sorry, the page is restricted to authorized users only
            </div>
            <a href="{{ route('login') }}" class="btn btn-border">Login Page</a>
        </div>
    </div>
@endsection
@section('extra_js')
@endsection