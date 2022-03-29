<nav class="main-header navbar navbar-expand navbar-white navbar-light mb-2">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item mr-3">
            <div class="user-panel mt-2  mb-2 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->level }}</a>
                </div>
                <div class="image">
                    <img src="{{ asset('admlte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                
            </div>
        </li>

        <!-- Messages Dropdown Menu -->


    </ul>
</nav>
