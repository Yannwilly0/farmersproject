<!doctype html>
<html lang="en">
  <head>
    <title>FARMERS HUB</title>
    <link rel="icon" href="{{asset('images/logo-topex-ci.png')}}" sizes="32x32"/>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
           
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand" style="background-color: #28a745;">
        <a class="h4  text-white m-3 text-decoration-none" href="{{route('admin.index')}}"> HOME </a>
        <button class="btn  btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars fa-2x"></i></button>
        <!-- Navbar Search-->
        <h3 class="ml-auto text-white">ADMIN PORTAIL</h3>
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0 "></div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0 mb-3 mr-3 mt-3" style="background-color: #fff;">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-secondary" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->nom }} </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                   
                <a class="dropdown-item" href=""><i class="fa fa-lock" aria-hidden="true"></i> mot de passe</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> <i class="fas fa-sign-in-alt    "></i>
                        {{ __('Se deconnecter') }}
                </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark " id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                             
                        <div class="sb-sidenav-menu-heading">USERS MANAGEMENT</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClasses" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                <i class="fa fa-users icon-color" aria-hidden="true"></i>
                                </div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                            </a>
                            <div class="collapse" id="collapseClasses" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('admin.users.list')}}"> <i class="fa fa-users icon-color sub-icon" aria-hidden="true"></i> Users list</a>
                                    <a class="nav-link" href="{{route('admin.users.user.add')}}"> <i class="fa fa-plus-circle icon-color sub-icon" aria-hidden="true"></i> Add user</a>
                                    <a class="nav-link" href="{{route('admin.users.user.login')}}"> <i class="fas fa-sign-in-alt icon-color sub-icon   "></i> login details</a>
                                </nav>
                            </div>
                           
                        
                        
                        <div class="sb-sidenav-menu-heading">FARMERS MANAGEMENT</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFarmers" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                            <i class="fa fa-user-circle icon-color" aria-hidden="true"></i>
                            </div>
                            Farmers
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        </a>
                        <div class="collapse" id="collapseFarmers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.farmers.list')}}"> <i class="fa fa-users icon-color sub-icon" aria-hidden="true"></i> Manage Farmers</a>
                                <a class="nav-link" href="{{route('admin.farmer.add')}}"> <i class="fa fa-plus-circle icon-color sub-icon" aria-hidden="true"></i> Add Farmer</a> 
                            </nav>
                        </div>
                        
                        <div class="sb-sidenav-menu-heading">REPORTS</div>
                        <a class="nav-link" href="{{route('admin.farmers.report')}}">
                           
                            <i class="fa fa-user-circle icon-color sub-icon " aria-hidden="true"></i>    Farmers
                        </a>
                       
                        <a class="nav-link" href="{{route('admin.reports.daily.dates')}}">
                           
                           <i class="fa fa-calendar icon-color sub-icon" aria-hidden="true"></i> Daily
                     </a>
                        <div class="sb-sidenav-menu-heading">SALES REPORTS</div>
                        <a class="nav-link" href="{{route('admin.sales.dates')}}">
                           
                            <i class="fa fa-check icon-color sub-icon" aria-hidden="true"></i>sales
                        </a>
                        <div class="sb-sidenav-menu-heading">ADMINS MANAGEMENT</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Admincollapse" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-briefcase icon-color" aria-hidden="true"></i>
                            </div>
                            Admins
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        </a>
                        <div class="collapse" id="Admincollapse" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('admin.admins.list')}}"> <i class="fa fa-briefcase icon-color sub-icon" aria-hidden="true"></i> Manage Admins</a>
                                <a class="nav-link" href="{{route('admin.admins.user.add')}}"> <i class="fa fa-plus-circle icon-color sub-icon" aria-hidden="true"></i> Create Admin</a>
                                <a class="nav-link" href="{{route('admin.admins.user.login')}}"> <i class="fas fa-sign-in-alt icon-color sub-icon   "></i> login details</a>
                            </nav>
                        </div>
                        
                  
                        
                        
                        
                        
                               
                                    
                       


                    </div>

                        </div>
                        
                        <div class="sb-sidenav-footer">
                            <div class="small">Logged in as: </div>
                            
                        </div>
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="mt-3 m-2">
                    <div class="container-fluid">
                        @include('layouts.messages')
                    </div>
                   @yield('content')
                </div>       
       
        
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy;  2021</div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
   
    <script>
        $("#sidebarToggle").on("click", function(e) {
                e.preventDefault();
                $("body").toggleClass("sb-sidenav-toggled");
            });
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap',
            format: 'dd-mm-yyyy'
        });
    </script>
    

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/graph.js') }}"></script>
  
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 

   
  </body>

</html>