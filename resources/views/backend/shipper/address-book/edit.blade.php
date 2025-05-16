

<div class="modal fade" id="addressBookEdit{{ $address->id }}" tabindex="-1" aria-labelledby="subUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content custom-modal">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
          <h5 class="text-center modal-title w-100" id="subUserModalLabel">UPDATE ADDRESS</h5>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

       <form method="POST" action="{{ route('shipper.address-book.update', $address->id) }}">
            @csrf
            @method('PUT') <!-- This is the key part -->

            <div class="modal-body">
              <div class="row">
                <div class="mb-3 col-md-12">
                  <label for="name" class="form-label">COMPANY NAME</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Company Name" value="{{ old('name', $address->name) }}" >
                </div>

                <div class="mb-3 col-md-12">
                  <label for="street_address" class="form-label">STREET ADDRESS</label>
                  <input type="text" class="form-control" name="street_address" placeholder="Enter Street Address" value="{{ old('street_address', $address->street_address) }}" >
                </div>

                <div class="mb-3 col-md-12">
                  <label for="city" class="form-label">CITY</label>
                  <input type="text" class="form-control" name="city" placeholder="City" value="{{ old('city', $address->city) }}" >
                </div>

                <div class="mb-3 col-md-6">
                  <label for="state" class="form-label">STATE/PROVINCE</label>
                  <input type="text" class="form-control" name="state" placeholder="State" value="{{ old('state', $address->state) }}" >
                </div>

                <div class="mb-3 col-md-6">
                  <label for="postal_code" class="form-label">ZIP/POSTAL CODE</label>
                  <input type="number" class="form-control" name="postal_code" placeholder="Postal Code" value="{{ old('postal_code', $address->postal_code) }}" >
                </div>

                <div class="mb-3 col-md-12">
                  <label for="country" class="form-label">COUNTRY</label>
                  <select class="form-control" name="country" required>
                    <option value="mexico" {{ old('country', $address->country) == 'mexico' ? 'selected' : '' }}>Mexico</option>
                    <option value="us" {{ old('country', $address->country) == 'us' ? 'selected' : '' }}>US</option>

                  </select>
                </div>

                <div class="mb-3 col-md-12">
                  <label for="type" class="form-label">Type</label>
                  <select class="form-control" name="type" required>
                    <option value="pickup" {{ old('type', $address->type) == 'pickup' ? 'selected' : '' }}>Pickup</option>
                    <option value="delivery" {{ old('type', $address->type) == 'delivery' ? 'selected' : '' }}>Delivery</option>
                  </select>
                </div>

                <div class="mb-3 col-md-12">
                  <label for="contact_person_name" class="form-label">CONTACT PERSON NAME</label>
                  <input type="text" class="form-control" name="contact_person_name" placeholder="Contact Person Name" value="{{ old('contact_person_name', $address->contact_person_name) }}" >
                </div>

                <div class="mb-3 col-md-12">
                  <label for="phone" class="form-label">PHONE NUMBER</label>
                  <input type="number" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone', $address->phone) }}" >
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="submit-btn">
                    {{ isset($address) ? 'Update' : 'Submit' }} <!-- Fixed typo -->
                </button>
            </div>

            </div>
          </form>

      </div>
    </div>
  </div>


