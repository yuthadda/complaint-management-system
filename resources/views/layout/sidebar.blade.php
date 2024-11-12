
@include('layout.header')
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="{{route('complaints.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Complaints
                        </a>
                        <a class="nav-link collapsed" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Users
                        </a>

                        <div class="sb-sidenav-menu-heading">Setting</div>
                        <a class="nav-link collapsed" href="{{route('categories.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Categories
                        </a>
                        <a class="nav-link collapsed" href="{{route('departments.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Departments
                        </a>
                        <a class="nav-link collapsed" href="{{route('roles.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Roles
                        </a>
                        <a class="nav-link collapsed" href="{{route('teams.index')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Teams
                        </a>
                    </div>
                </div>


            </nav>
        </div>

