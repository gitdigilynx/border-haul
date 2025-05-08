<div class="modal fade" id="shipperEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="driverModalLabel">
                    {{ isset($user) ? 'Update Shipper' : 'Add Shipper' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="shipperForm" method="POST"
                action="{{ route('admin.shippers.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body row">
                    <div class="mb-2 col-md-6">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $user->name ?? '') }}" placeholder="Name" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email"
                            value="{{ old('email', $user->email ?? '') }}" placeholder="Email" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="company_address" class="form-label">Company Name <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_name"
                            value="{{ old('company_name', $user->shipper->company_name ?? '') }}"
                            placeholder="Company Address" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="company_address" class="form-label">Company Address <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_address"
                            value="{{ old('company_address', $user->shipper->company_address ?? '') }}"
                            placeholder="Company Address" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone"
                            value="{{ old('phone', $user->shipper->phone ?? '') }}" placeholder="Phone" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="service_category" class="form-label">Service Category <span
                                class="text-danger">*</span></label>
                        <select name="service_category" id="service_category" class="form-control">
                            <option value="" selected="">Select</option>
                            @foreach (serviceCategory() as $key => $services_category)
                                <option value="{{ $key }}"
                                    {{ old('service_category', $user->shipper->service_category ?? '') == $key ? 'selected' : '' }}>
                                    {{ $services_category }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="is_active" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" name="is_active">
                            <option value="">Select</option>
                            <option value="1"
                                {{ old('is_active', $user->carrier->is_active ?? '') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0"
                                {{ old('is_active', $user->carrier->is_active ?? '') == '0' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        {{ isset($user) ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
