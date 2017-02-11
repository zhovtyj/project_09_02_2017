<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a class="{{ Request::is('admin') ? 'active-menu' : '' }}" href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/service') ? 'active-menu' : '' }}" href="{{ route('service.index') }}"><i class="fa fa-qrcode"></i> Services</a>
            </li>
            <li>
                <a href="{{ route('user.index') }}"><i class="glyphicon glyphicon-user"></i> Clients</a>
            </li>
            <li>
                <a href="chart.html"><i class="glyphicon glyphicon-usd"></i> Payments</a>
            </li>
            <li>
                <a href="table.html"><i class="fa fa-table"></i> Example</a>
            </li>
            <li>
                <a href="form.html"><i class="fa fa-edit"></i> Example</a>
            </li>


            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Example<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>
            <li>
                <a href="empty.html"><i class="fa fa-fw fa-file"></i> Example</a>
            </li>
        </ul>

    </div>

</nav>