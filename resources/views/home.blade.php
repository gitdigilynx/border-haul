@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                    <div class="flex-grow-1">
                        <h4 class="m-0 fs-18 fw-semibold">Dashboard</h4>
                    </div>
                </div>

                <!-- start row -->
                <div class="row">

                    <div class="col-md-12 col-xl-12">
                        <div class="row g-3">
                            @if(auth()->user()->hasRole('Admin'))
                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <div class="widget-first">

                                                <div class="mb-2 d-flex align-items-center">
                                                    <div
                                                        class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                        <div class="text-center bg-secondary rounded-circle widget-size">
                                                            <!-- Carrier Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 640 512">
                                                                <path fill="#ffffff"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-dark fs-15 fw-bold">Sub Admin</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0 text-black fs-22 me-3">{{ $totalSubAdmin }}</h3>
                                                    {{-- <div class="text-center">
                                                        <span class="text-success fs-14"><i
                                                                class="mdi mdi-trending-up fs-14"></i> +3%</span>
                                                        <p class="mb-0 text-dark fs-13">Last 7 days</p>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endif
                            @if(auth()->user()->hasRole('Admin'))
                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">

                                    </div>
                                </div>


                            @endif
                            @if(auth()->user()->hasRole('Carrier') || auth()->user()->hasRole('Admin') || auth()->user()->hasRole('subAdmin'))

                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <div class="widget-first">

                                                <div class="mb-2 d-flex align-items-center">
                                                    <div
                                                        class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                        <div class="text-center bg-primary rounded-circle widget-size">
                                                            <!-- Shipper Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 640 512">
                                                                <path fill="#ffffff"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-dark fs-15 fw-bold">Total Carriers</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0 text-black fs-22 me-3">{{ $totalCarriers }}</h3>
                                                    <div class="text-center">
                                                        {{-- <span class="text-primary fs-14"><i
                                                                class="mdi mdi-trending-up fs-14"></i> +5%</span>
                                                        <p class="mb-0 text-dark fs-13">Last 7 days</p> --}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <div class="widget-first">

                                                <div class="mb-2 d-flex align-items-center">
                                                    <div
                                                        class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                        <div class="text-center bg-secondary rounded-circle widget-size">
                                                            <!-- Carrier Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 640 512">
                                                                <path fill="#ffffff"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-dark fs-15 fw-bold">Total Sub Users</p>
                                                </div>


                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0 text-black fs-22 me-3">{{ $totalSubCarriers }}</h3>

                                                    <div class="text-muted">
                                                        {{-- <span class="text-danger fs-14 me-2"><i
                                                                class="mdi mdi-trending-down fs-14"></i> 18%</span>
                                                        <p class="mb-0 text-dark fs-13">Last 7 days</p> --}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(auth()->user()->hasRole('Shipper') || auth()->user()->hasRole('Admin') || auth()->user()->hasRole('subAdmin'))

                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <div class="widget-first">

                                                <div class="mb-2 d-flex align-items-center">
                                                    <div
                                                        class="p-2 border border-secondary border-opacity-10 bg-secondary-subtle rounded-pill me-2">
                                                        <div class="text-center bg-secondary rounded-circle widget-size">
                                                            <!-- Carrier Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 640 512">
                                                                <path fill="#ffffff"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-dark fs-15 fw-bold">Total Shippers</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0 text-black fs-22 me-3">{{ $totalShippers }}</h3>
                                                    {{-- <div class="text-center">
                                                        <span class="text-success fs-14"><i
                                                                class="mdi mdi-trending-up fs-14"></i> +3%</span>
                                                        <p class="mb-0 text-dark fs-13">Last 7 days</p>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-6">
                                    <div class="mb-0 card">
                                        <div class="card-body">
                                            <div class="widget-first">

                                                <div class="mb-2 d-flex align-items-center">
                                                    <div
                                                        class="p-2 border border-primary border-opacity-10 bg-primary-subtle rounded-pill me-2">
                                                        <div class="text-center bg-primary rounded-circle widget-size">
                                                            <!-- Shipper Icon -->
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 640 512">
                                                                <path fill="#ffffff"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 text-dark fs-15 fw-bold">Total Sub Users</p>
                                                </div>

                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h3 class="mb-0 text-black fs-22 me-3">{{ $totalSubShippers }}</h3>
                                                    {{-- <div class="text-center">
                                                        <span class="text-primary fs-14 me-2"><i
                                                                class="mdi mdi-trending-up fs-14"></i> 12.8%</span>
                                                        <p class="mb-0 text-dark fs-13">Last 7 days</p>
                                                    </div> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center col fs-13 text-muted">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script> - {{ translater('Made with') }} <span
                            class="mdi mdi-heart text-danger"></span> {{ translater('by') }} <a href="https://digilynx.dev/"
                            class="text-reset fw-semibold">{{ translater('digilynx') }}</a>

                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

@endsection
