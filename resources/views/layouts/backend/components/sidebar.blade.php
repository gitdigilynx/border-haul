<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!-- Sidebar -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo/Border-Haul-logo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="80" style="margin-left:-20px"
                        >
                    </span>
                </a>
            </div>

            <ul id="side-menu" class="sidebar-menu">
                <li class="mt-4 d-none d-lg-block">
                    <div class="position-relative topbar-search">
                        <input style="border-radius: 10px" type="text" class="bg-white form-control bg-light ps-4" placeholder="Search...">
                        <i
                            class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                    </div>
                </li>

                {{-- <li class="mt-1 menu-title">Dashboard</li> --}}

                @if (auth()->user()->hasRole('Admin'))
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif

                {{-- @if (auth()->user()->hasRole('Shipper'))
                <li>
                    <a href="{{ route('shipper.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif --}}

                {{-- @if (auth()->user()->hasRole('Carrier'))
                 <li>
                    <a href="{{ route('carrier.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif --}}


                <li class="mt-1 menu-title">Menu</li>

                {{-- Shipper Menu --}}
                @if (auth()->user()->hasRole('Shipper'))

                <li>
                    <a href="#sidebarDashboards">
                        <img src="{{ asset('assets/icons/shipper/truck.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span style="color:black; font-weight: 600;">Request Truck</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('shipper.deliveries') }}" class="tp-link">
                      </i>
                        <img src="{{ asset('assets/icons/shipper/delivery.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span style="color:black; font-weight: 600;">My Delivery</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="tp-link">
                        <img src="{{ asset('assets/icons/shipper/info.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span style="color:black; font-weight: 600;">Company Info</span>
                    </a>
                </li>

                    <li>
                        <a href="{{ route('shipper.sub-users') }}" class="tp-link">
                            <img src="{{ asset('assets/icons/shipper/user.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Company Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shipper.address-book') }}" class="tp-link">
                            <img src="{{ asset('assets/icons/shipper/home.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Address Book</span>
                        </a>
                    </li>

                 <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <img src="{{ asset('assets/icons/shipper/payment.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span style="color:black; font-weight: 600;">Payment System</span>
                    </a>
                </li>
                @endif


                {{-- Carrier Menu --}}

                {{-- @if (auth()->user()->hasRole('Carrier') || auth()->user()->hasRole('Admin')) --}}
                @if (auth()->user()->hasRole('Carrier'))

                    <li>
                        <a href="#" class="tp-link">
                            <img src="{{ asset('assets/icons/carrier/delivery.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Job Request</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="tp-link">
                            <img src="{{ asset('assets/icons/carrier/history.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Job History</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="tp-link">
                            <img src="{{ asset('assets/icons/carrier/payment.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Earnings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.trucks') }}" class="tp-link">
                            <img src="{{ asset('assets/icons/carrier/truck.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Truck/Drivers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.documents') }}" class="tp-link">
                            <img src="{{ asset('assets/icons/carrier/info.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Documents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.carrier-users') }}">
                            <img src="{{ asset('assets/icons/carrier/user.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Company User</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <img src="{{ asset('assets/icons/carrier/user.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                            <span style="color:black; font-weight: 600;">Profile</span>
                        </a>
                    </li>


                @endhasrole

                {{-- Admin Menu --}}
                @hasrole('Admin')

                    <li>
                        <a href="{{ route('admin.sub-admin') }}">
                            <i class="fas fa-ticket-alt"></i>
                            <span>Sub Admins</span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarBaseui" data-bs-toggle="collapse">
                            <i class="fa-solid fa-users"></i>

                            <span> Company Users </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarBaseui">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="#sidebarForms" data-bs-toggle="collapse">
                                        <span> Carriers </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarForms">
                                        <ul class="nav-second-level">

                                            <li>
                                                <a href="{{ route('admin.carriers') }}" class="tp-link">Carrier
                                                    Users</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.sub-carriers') }}" class="tp-link">Sub
                                                    Users</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                                        <span> Shipper </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarExpages">
                                        <ul class="nav-second-level">

                                            <li>
                                                <a href="{{ route('admin.shippers') }}" class="tp-link">Shipper
                                                    Users</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('admin.sub-shippers') }}" class="tp-link">Sub
                                                    Users</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#sidebarIcons" data-bs-toggle="collapse">

                            <i class="fas fa-user-lock"></i>

                            <span> Role & Permissions </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarIcons">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('admin.permissions.index') }}">

                                        <span>Permissions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.role-permissions') }}" class="tp-link">Assign
                                        Permission</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                @endhasrole

                <hr style="margin-top: 40px;">
                <li>
                    <a href="#">
                        <img src="{{ asset('assets/icons/help.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">

                        <span>Help Support</span>
                    </a>
                </li>

                @hasrole('Shipper')

                <li>
                    <a href="{{ route('shipper.profile.list') }}">
                        <img src="{{ asset('assets/icons/shipper/setting.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span>Settings</span>
                    </a>
                </li>
                @endhasrole

                @hasrole('Carrier')

                <li>
                    <a href="{{ route('carrier.profile.list') }}">
                        <img src="{{ asset('assets/icons/carrier/setting.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span>Settings</span>
                    </a>
                </li>
                @endhasrole
                <li>
                    <a href="#">
                        <img src="{{ asset('assets/icons/login.svg') }}" alt="Truck Icon" style="width: 25px; height: 25px; margin-right: 8px;">
                        <span>Logout</span>
                    </a>
                </li>

                {{-- Logout (Uncomment if needed) --}}
                {{--
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>
                --}}
        </ul>
    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>
</div>
</div>
<!-- Left Sidebar End -->
