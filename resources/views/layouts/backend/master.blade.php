<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title','Border Haul')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
    <meta name="author" content="Zoyothemes"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- App CSS -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" id="app-style" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />

    <!-- SweetAlert2 -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body data-menu-color="light" data-sidebar="default">
    @include('layouts.backend.components.topbar')

    <div class="wrapper">
        @include('layouts.backend.components.sidebar')

        <div class="main-content">
            <div class="container-fluid">


                {{-- SweetAlert Notifications --}}
                @if(session('success'))
                    <script>
                        Swal.fire({
                            title: 'Success!',
                            text: "{{ session('success') }}",
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    </script>
                @endif

                @if(session('error'))
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: "{{ session('error') }}",
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    </script>
                @endif

                {{-- Main page content --}}
                @yield('content')

            </div>
        </div>
    </div>

    @include('layouts.backend.components.footer')
</body>
</html>
