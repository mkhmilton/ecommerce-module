<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header text-center">
            <a class="navbar-brand" href="{{ url('dashboard') }}">
                <b><i class="wi wi-sunset"></i> {{ config('app.name') }}</b>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                                         href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a
                            class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                            href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light logout-btn" href="javascript:0"><i class="fa fa-lock"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" target="_blank" href="{{ route('index') }}"><i class="fa fa-globe"></i></a>
                </li>
                <li class="nav-item right-side-toggle">
                    <a class="nav-link waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
