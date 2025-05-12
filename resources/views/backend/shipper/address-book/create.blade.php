<!-- Address Book Modal -->
<div class="modal fade" id="addressBook" tabindex="-1" aria-labelledby="subUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content custom-modal">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        <div class="modal-header" style="border-bottom: none;margin-bottom: -15px;">
          <h5 class="text-center modal-title w-100" id="subUserModalLabel">MANAGE YOUR ADDRESS</h5>
        </div>

        <form id="shipperAddressBook" method="POST" action="{{ route('shipper.address-book.store') }}">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="name" class="form-label">COMPANY NAME </label>
                <input type="text" class="form-control" name="name" placeholder="Enter Company Name" required>
              </div>

              <div class="mb-3 col-md-12">
                <label for="street_address" class="form-label">STREET ADDRESS</label>
                <input type="text" class="form-control" name="street_address" placeholder="Enter Street Address" required>
              </div>

              <div class="mb-3 col-md-12">
                <label for="city" class="form-label">CITY</label>
                <input type="text" class="form-control" name="city" placeholder="City" required>
              </div>

              <div class="mb-3 col-md-6">
                <label for="state" class="form-label">STATE/PROVINCE</label>
                <input type="text" class="form-control" name="state" placeholder="State" required>
              </div>

              <div class="mb-3 col-md-6">
                <label for="postal_code" class="form-label">ZIP/POSTAL CODE</label>
                <input type="number" class="form-control" name="postal_code" placeholder="Postal Code" required>
              </div>

              <div class="mb-3 col-md-12">
                <label for="country" class="form-label">COUNTRY</label>
                <select class="form-control" name="country" required>
                  <option selected>Select Country</option>
                  <option value="mexico">Mexico</option>
                  <option value="us">US</option>
                  {{-- <option value="germany">Germany</option> --}}
                  {{-- <option value="paris">Paris</option>
                  <option value="dubai">Dubai</option> --}}
                </select>
              </div>

              <div class="mb-3 col-md-12">
                <label for="type" class="form-label">Type</label>
                <select class="form-control" name="type" required>
                  <option selected>Select Type</option>
                  <option value="pickup">Pickup</option>
                  <option value="delivery">Delivery</option>
                </select>
              </div>

              <div class="mb-3 col-md-12">
                <label for="contact_person_name" class="form-label">CONTACT PERSON NAME</label>
                <input type="text" class="form-control" name="contact_person_name" placeholder="Contact Person Name" required>
              </div>

              <div class="mb-3 col-md-12">
                <label for="phone" class="form-label">PHONE NUMBER</label>
                <input type="number" class="form-control" name="phone" placeholder="Phone" required>
              </div>
            </div>

            <div class="mt-3 text-center">
              <button type="submit" class="submit-btn">Save</button>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
