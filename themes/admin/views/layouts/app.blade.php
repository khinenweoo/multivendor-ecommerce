<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Proud of Myanmar') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css', 'themes/admin') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>


        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('admin') }}/img/favicon.png">
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />

        <!-- Icons -->
        <link href="{{ asset('admin') }}/css/nucleo-icons.css" rel="stylesheet" />

        <!-- Font Awesome -->
        <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">

         <!-- Bootstrap -->
         <link href="{{ asset('frontend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

         <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
 
        <!-- CSS -->
        <link href="{{ asset('admin') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('admin') }}/css/theme.css" rel="stylesheet" />
        @livewireStyles
    
        @yield('extra_css')
  

    </head>



    <body class="white-content {{ $class ?? '' }} admin-dashboard">
        @auth()
            <div class="wrapper">
            @include('layouts.navbar.auth')
                   
                <div class="main-panel horizontal-nav">
                @include('layouts.sidebar')

                    <div class="content">
                        @include('flash-message')
                        @yield('content')
                      
                    </div>

                    @include('layouts.footeradmin')
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbar.guest')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
               
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footeradmin')
                </div>
            </div>
        @endauth

  

        <script src="{{ asset('admin') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('admin') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('admin') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('admin') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>

        <!-- EXTRA JS -->
        <div class="extra_js">
            @yield('extra_js')
        </div>
        <!--  Google Maps Plugin    -->

        <!-- Chart JS -->
       <script src="{{ asset('admin') }}/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('admin') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('admin') }}/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('admin') }}/js/theme.js"></script>
        @livewireScripts


        <script type="text/javascript">
            window.livewire.on('categoryStore', () => {
                $('#createModal').modal('hide');
            });
            window.livewire.on('brandStore', () => {
                $('#createBrandModal').modal('hide');
            });
        </script>

        @stack('js')

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });
            });
        </script>
        @stack('js')

    </body>
</html>
