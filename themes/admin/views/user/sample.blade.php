<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body class="white-content clickup-chrome-ext_installed">

<div class="wrapper">
                  
            


    <div class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="col-4 text-right">
                        <a href="#" class="btn btn-sm btn-primary">Add user</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                
                <div class="">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr><th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Creation Date</th>
                            <th scope="col"></th>
                        </tr></thead>
                        <tbody>
                                                                <tr>
                                    <td>Admin Admin</td>
                                    <td>
                                        <a href="mailto:admin@white.com">admin@white.com</a>
                                    </td>
                                    <td>25/02/2020 09:11</td>
                                    <td class="text-right">
                                                                                        <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                                <a class="dropdown-item" href="#">Edit</a>
                                                                                                        </div>
                                            </div>
                                                                                </td>
                                </tr>
                                                        </tbody>
                    </table>
                </div>
                
            </div>
            
            <div class="card-footer py-4">
                
                <nav class="d-flex justify-content-end" aria-label="...">
                    
                </nav>
            </div>
        </div>
        <div class="alert alert-danger">
            <span>
              <b> </b> This is a PRO feature!</span>
          </div>
    </div>
</div>
                </div>

                <footer class="footer">
<div class="container-fluid">
    <ul class="nav">
        <li class="nav-item">
            <a href="https://creative-tim.com" target="blank" class="nav-link">
                Creative Tim
            </a>
        </li>
        <li class="nav-item">
            <a href="https://updivision.com" target="blank" class="nav-link">
                Updivision
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                About Us
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                Blog
            </a>
        </li>
    </ul>
    <div class="copyright">
        © 2020 made with <i class="tim-icons icon-heart-2"></i> by
        <a href="https://creative-tim.com" target="_blank">Creative Tim</a> &amp;
        <a href="https://updivision.com" target="_blank">Updivision</a> for a better web.
    </div>
</div>
</footer>
            </div>
        </div>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
            @csrf
            <div class="fixed-plugin">
        <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Background</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors text-center">
                    <span class="badge filter badge-primary active" data-color="primary"></span>
                    <span class="badge filter badge-info" data-color="blue"></span>
                    <span class="badge filter badge-success" data-color="green"></span>
                </div>
                <div class="clearfix"></div>
                </a>
            </li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
                Documentation
                </a>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>
            <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> · 45</button>
                <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> · 50</button>
                <br>
                <br>
                <a class="github-button btn btn-round btn-default" href="https://github.com/creativetimofficial/white-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
            </li>
            </ul>
        </div>
    </div>

</body>
</html>
