<header class="header-section @yield('header-type')">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>

        <div class="header-right">
            <a class="user-tag" data-toggle="tooltip" data-placement="bottom" title="Login or register" href=""><i class="pt-10 fas fa-user"></i></a>
            <a class="card-bag" href="#"><img src="{{ asset('img/icons/bag.png') }}" alt=""><span>2</span></a>
            <a href="#" class="search"><img src="{{ asset('img/icons/search.png') }}" alt=""></a>
        </div>
        
        <ul class="main-menu">
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Woman</a></li>
            <li><a href="#">Man</a></li>
            <li><a href="#">LookBook</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
</header>

<!-- Header section end -->
