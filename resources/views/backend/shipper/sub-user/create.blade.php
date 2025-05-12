<div class="modal fade" id="subUserModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header" style="border-bottom: none;">
                <h5 class="text-center modal-title w-100">
                    Deliver More, Stress Less to Invite Your Team
                </h5>
            </div>

            <form id="subUserForm" method="POST" action="{{ route('shipper.sub-users.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter First Name" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="submit-btn">Invite</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
