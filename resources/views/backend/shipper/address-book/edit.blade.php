<div class="modal fade" id="addressBookEdit" tabindex="-1" aria-labelledby="subUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="subUserModalLabel">
            {{ isset($address) ? 'Edit Address Book' : 'Add Address Book' }}
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="shipperAddressBook"
              class="px-3 py-2 row g-3"
              method="POST"
              action="{{ isset($address) ? route('shipper.address-book.update', $address->id) : route('shipper.address-book.store') }}">
          @csrf

          <div class="modal-body row">

            <div class="col-md-6">
              <label for="name" class="form-label">Contact Name</label>
              <input type="text" class="form-control" name="name" placeholder="Full Name"
                     value="{{ old('name', $address->name ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" name="phone" placeholder="Phone"
                     value="{{ old('phone', $address->phone ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="street_address" class="form-label">Street Address</label>
              <input type="text" class="form-control" name="street_address" placeholder="Street Address"
                     value="{{ old('street_address', $address->street_address ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" name="city" placeholder="City"
                     value="{{ old('city', $address->city ?? '') }}" required>
            </div>

            <div class="col-md-6">
              <label for="state" class="form-label">State</label>
              <input type="text" class="form-control" name="state" placeholder="State"
                     value="{{ old('state', $address->state ?? '') }}">
            </div>

            <div class="col-md-6">
              <label for="postal_code" class="form-label">Postal Code</label>
              <input type="text" class="form-control" name="postal_code" placeholder="Postal Code"
                     value="{{ old('postal_code', $address->postal_code ?? '') }}">
            </div>

            <div class="col-md-6">
              <label for="country" class="form-label">Country</label>
              <input type="text" class="form-control" name="country" placeholder="Country"
                     value="{{ old('country', $address->country ?? '') }}">
            </div>

            <div class="col-md-6">
              <label for="type" class="form-label">Type</label>
              <select class="form-control" name="type" required>
                <option value="pickup" {{ old('type', $address->type ?? '') == 'pickup' ? 'selected' : '' }}>Pickup</option>
                <option value="delivery" {{ old('type', $address->type ?? '') == 'delivery' ? 'selected' : '' }}>Delivery</option>
              </select>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">{{ isset($address) ? 'Update' : 'Save' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
