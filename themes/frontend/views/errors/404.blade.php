@extends('layouts.app')
@section('extra_css')
    <style>
        .error-template {
            padding: 80px 0;
        }
        .block-title {
            font-size: 3.6em;
            font-weight: 500;
            margin-bottom: 30px;
        }
        .back-link {
            margin-top: 10px;
            margin-bottom: 40px;
            text-decoration: underline!important;
            color: #3b628a;
        }
    </style>
@endsection
@section('content')
    <div class="error-template">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-wrapper mx-auto">
                        <img src="" alt="">
                        <h1 class="block-title text-center">Page <strong>Not</strong> Found!</h1>
                        <div class="description text-center">
                        Oops, we cannot find what you are looking for. Please try again. <br><br>
                        <a href="{{ route('home') }}" class="back-link mx-auto">Back</a>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection