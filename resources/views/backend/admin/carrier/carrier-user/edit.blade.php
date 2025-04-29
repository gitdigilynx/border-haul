@extends('layouts.backend.master')
@section('title', 'Dashboard')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="mt-5 container-fluid ">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">Update Users</h5>
                            {{-- <button type="button" class="btn btn-success">Add Users</button> --}}

                        </div>
                        <div class="card-body">
                        <form id="subUserForm" class="px-3 py-2 row g-3" method="POST" action="">
                        @csrf

                        <div class="modal-body row">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone">
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div> --}}
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
