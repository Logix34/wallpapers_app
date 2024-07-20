<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin Panel</div>

                     <a class="nav-link" href="{{route('dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>


                <div class="sb-sidenav-menu-heading">Categories</div>
                    <a class="nav-link" href="{{route('Category')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                        Categories
                    </a>
                <div class="sb-sidenav-menu-heading">Category Wallpapers</div>
                <a class="nav-link" href="{{route('Wallpaper')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></i></div>
                    Wallpapers
                </a>
                <form method="post" action="{{route('logout')}}" id="lform" >
                    @csrf
                    <a class="nav-link"  onclick="document.getElementById('lform').submit();">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a></form>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{auth()->user()->first_name.' '. auth()->user()->last_name}}
        </div>
    </nav>
</div>
