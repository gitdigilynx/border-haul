<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">

                <a href="{{ route('home') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo/Border-Haul-logo.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="70"
                            style="margin-left: 30px;">
                    </span>
                </a>
            </div>
            <ul id="side-menu">
                <li class="d-none d-lg-block mt-4">
                    <div class="position-relative topbar-search">
                        <input type="text" class="bg-opacity-75 form-control bg-light ps-4" placeholder="Search...">
                        <i class="mdi mdi-magnify fs-16 position-absolute text-muted top-50 translate-middle-y ms-2"></i>
                    </div>
                </li>

                <li class="mt-1 menu-title">Menu</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                {{-- Menu for Shipper --}}
                @hasrole($shipperRole)
                    <li>
                        <a href="#sidebarDashboards">
                            <i class="fa-solid fa-truck-moving"></i>
                            <span> Request Truck </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarAuth" data-bs-toggle="collapse">
                            <i class="fa-solid fa-briefcase"></i>
                            <span> My Delivery </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shipper.sub-users') }}">
                            <i class="fa-solid fa-user"></i>
                            <span> Shipper Users </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('shipper.address-book') }}">
                            <i class="fa-solid fa-house-chimney"></i>
                            <span> Address Book </span>
                        </a>
                    </li>

                    <li>
                        <a href="#sidebarExpages" data-bs-toggle="collapse">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <span> Payment System </span>
                        </a>
                    </li>
                @endhasrole

                {{-- Menu for Carrier --}}
                @hasrole($carrierRole)
                    <li>
                        <a href="{{ route('carrier.carrier-users') }}">
                            <i class="fa-solid fa-users"></i>
                            <span> Carrier Users </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.documents') }}">
                            <i class="fa-solid fa-file"></i>
                            <span> Carrier Documents </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.drivers') }}">
                            <i class="fa-solid fa-user"></i>
                            <span> Drivers </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('carrier.trucks') }}">
                            <i class="fa-solid fa-truck"></i>
                            <span> Trucks </span>
                        </a>
                    </li>
                @endhasrole

                <hr style="margin-top: 40px;">

                <li>
                    <a href="#">
                        <i class="fas fa-headset"></i>
                        <span> Help & Support </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('profile.list') }}">
                        <i class="fas fa-cog"></i>
                        <span> Settings </span>
                    </a>
                </li>
                {{-- <li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                             <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                <span> Logout </span>
                            </a>
                        </form>
                    </li> --}}
            </ul>


        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>


    </div>
</div>
<!-- Left Sidebar End -->
