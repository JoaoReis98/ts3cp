<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.gravatar.com/avatar/{{ trim(md5($logged->email)) }}?s=160&r=pg&d=mm" class="img-circle" alt="Avatar">
            </div>
            <div class="pull-left info">
                <p><a href="{{ URL::Route('dashboard') }}">{{ $logged->username }}</a></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="{{ URL::Route('dashboard') }}"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-cog"></i> <span>Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::Route('servers') }}"><i class="fa fa-server"></i> <span>Servers</span></a></li>
                    <li><a href=""><i class="fa fa-server"></i> <span>Series</span></a></li>
                    <li><a href=""><i class="fa fa-tags"></i> <span>Categories</span></a></li>
                    <li><a href=""><i class="fa fa-rss"></i> <span>Channels</span></a></li>
                </ul>
            </li>
            <li><a href="{{URL::Route('auth_logout')}}"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>