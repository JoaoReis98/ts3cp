<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ URL::Route('dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>TS</b>3</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>TS3</b>CP</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://www.gravatar.com/avatar/{{ trim(md5($logged->email)) }}?s=160&r=pg&d=mm" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ $logged->username }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="https://www.gravatar.com/avatar/{{ trim(md5($logged->email)) }}?s=160&r=pg&d=mm" class="img-circle" alt=" Avatar">

                            <p>

                                <small>Member since </small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="col-xs-12">
                                <a href="{{URL::Route('auth_logout')}}" class="btn btn-default col-xs-12 btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>