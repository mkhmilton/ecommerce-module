<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
            <div class="user-profile">
                <div class="user-pro-body">
                    <div><img src="{{ asset('assets/backend/images/user.png') }}" alt="" class="img-circle"></div>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}<span class="caret"></span></a>
                        <div class="dropdown-menu animated flipInY">
                            <!-- text-->
                            <a href="{{ url('profile') }}" class="dropdown-item"><i class="ti-user"></i> My
                                Profile</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="javascript:0" class="dropdown-item logout-btn"><i class="fas fa-power-off"></i>
                                Logout</a>
                            <!-- text-->
                        </div>
                    </div>
                </div>
            </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="far fa-circle text-success"></i>
                        <span class="hide-menu">
                            Products
                        </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.products.index') }}">List </a></li>
                        <li><a href="{{ route('admin.products.create') }}">Create new</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.orders.index') }}">
                        <i class="far fa-circle text-success"></i><span class="hide-menu">Orders</span>
                    </a>
                </li>
                <br>
                <br>
                <br>
                <br>
                <br>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
