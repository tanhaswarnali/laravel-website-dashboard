<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.include.head')
       
     
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <span class="text-white font-weight-bold" style="margin-left:20%"><span class="text-info">Username : </span>{{Auth::user()->name}}</span>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                        <form method="POST" action="{{ route('logout') }}">
                           @csrf
                            <a class="dropdown-item" href="{{Route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
                        </form>
                        </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            @include('backend.include.sdenav')
             <!-- sdenav -->
       
        <div id="layoutSidenav_content">
                <main>
                    @yield('man')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright © Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                ·
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
        </div> 
    </div>           
   
     
        <!-- Scrpt -->
        @include('backend.include.scrpt')
    </body>
</html>
