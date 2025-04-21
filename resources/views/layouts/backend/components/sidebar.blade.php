
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
                        <img src="{{ asset('assets/images/logo/Border-Haul-logo.png') }}" alt="" height="70" style="margin-left: 30px;">
                    </span>
                </a>
            </div>

            <ul id="side-menu ">
                <li class="mt-3 menu-title">Menu</li>

                <li>
                    <a href="{{ route('home') }}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

               {{-- Menu for Admin --}}

                @hasrole($adminRole)
                <li>
                    <a href="#sidebarDashboards">
                        <i data-feather="credit-card"></i>
                        <span> Request Truck </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="truck"></i>
                        <span> My Delivery </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('shipper.sub-users') }}">
                        <i data-feather="users"></i>
                        <span> Shipper Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('shipper.address-book') }}">
                        <i data-feather="book"></i>
                        <span> Address Book </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span> Payment System </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('carrier.carrier-users') }}">
                        <i data-feather="users"></i>
                        <span> Carrier Users </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('carrier.documents') }}">
                        <i data-feather="book"></i>
                        <span> Carrier Documents </span>
                    </a>
                </li>

                @endhasrole

               {{-- Menu for Shipper --}}
                @hasrole($shipperRole)
                <li>
                    <a href="#sidebarDashboards">
                        <i data-feather="credit-card"></i>
                        <span> Request Truck </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="truck"></i>
                        <span> My Delivery </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('shipper.sub-users') }}">
                        <i data-feather="users"></i>
                        <span> Shipper Users </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('shipper.address-book') }}">
                        <i data-feather="book"></i>
                        <span> Address Book </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i data-feather="credit-card"></i>
                        <span> Payment System </span>
                    </a>
                </li>
                @endhasrole

                {{-- Menu for Carrier --}}
                @hasrole('carrier')
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

                 {{-- <li>
                    <a href="{{ route('carrier.documents') }}">
                       <i class="fa-solid fa-truck"></i>
                        <span> Trucks </span>
                    </a>
                </li> --}}

                @endhasrole


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
