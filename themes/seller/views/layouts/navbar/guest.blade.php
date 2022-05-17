<nav class="navbar navbar-expand-lg navbar-absolute bg-transparent fixed-top">
    <div class="container">
        <div class="navbar-wrapper" style="height:76px;">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#">
            <img class="app-logo" src="{{ asset('frontend/images/home/logo.png') }}" width="75" alt="site-logo">
            </a>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link text-primary">
                        <i class="tim-icons icon-minimal-left"></i> {{ _('Back to Dashboard') }}
                    </a>
                </li> -->
                <!-- <li class="nav-item ">
                    <a href="{{ route('seller.login') }}" class="nav-link">
                        <i class="tim-icons icon-single-02"></i> {{ _('Login') }}
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
