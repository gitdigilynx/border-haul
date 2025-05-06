<div class="modal fade" id="carrierEditModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="driverModalLabel">
                    {{ isset($user) ? 'Update Carrier' : 'Add Carrier' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="carrierForm" method="POST"
                action="{{ route('admin.carriers.update', $user->id) }}" enctype="multipart/form-data">
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
                        <label for="company_address" class="form-label">Company Address <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="company_address"
                            value="{{ old('company_address', $user->carrier->company_address ?? '') }}"
                            placeholder="Company Address" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="phone"
                            value="{{ old('phone', $user->carrier->phone ?? '') }}" placeholder="Phone" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="authority" class="form-label">Authority <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="authority"
                            value="{{ old('authority', $user->carrier->authority ?? '') }}" placeholder="Authority" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="dot" class="form-label">DOT <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="dot"
                            value="{{ old('dot', $user->carrier->dot ?? '') }}" placeholder="DOT" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="mc" class="form-label">MC <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="mc"
                            value="{{ old('mc', $user->carrier->mc ?? '') }}" placeholder="MC" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="scac_code" class="form-label">SCAC Code <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="scac_code"
                            value="{{ old('scac_code', $user->carrier->scac_code ?? '') }}" placeholder="SCAC Code" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                        <select name="country" id="country" class="form-control" required>
                            <option value="">Select Country</option>
                            <option value="us"
                                {{ old('country', $user->carrier->country ?? '') == 'us' ? 'selected' : '' }}>US</option>
                            <option value="mexico"
                                {{ old('country', $user->carrier->country ?? '') == 'mexico' ? 'selected' : '' }}>Mexico
                            </option>
                        </select>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="caat_code" class="form-label">CAAT Code <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="caat_code"
                            value="{{ old('caat_code', $user->carrier->caat_code ?? '') }}" placeholder="CAAT Code" required>
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="service_category" class="form-label">Service Category <span
                                class="text-danger">*</span></label>
                        <select name="service_category" id="service_category" class="form-control">
                            <option value="" selected="">Select</option>
                            @foreach (serviceCategory() as $key => $services_category)
                                <option value="{{ $key }}"
                                    {{ old('service_category', $user->carrier->service_category ?? '') == $key ? 'selected' : '' }}>
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

                    <div class="col-md-6">
                        <label for="transfer_approval_documents" class="form-label">Transfer Approval Documents <span
                                class="text-danger">*</span></label>
                        <input type="file" name="transfer_approval_documents" id="transfer_approval_documents"
                            class="form-control">
                    </div>

                    <div class="mb-2 col-md-6">
                        <label for="insurance_certificate" class="form-label">Insurance Certificate <span
                                class="text-danger">*</span></label>
                        <input type="file" name="insurance_certificate" id="insurance_certificate"
                            class="form-control">
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
