<div class="modal fade" id="addressBookEdit{{ $address->id }}" tabindex="-1"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal-content custom-modal">

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-header custom-modal-header" style="border-bottom: none;margin-bottom: -15px;">
                <h5 class="text-center modal-title w-100 custom-modal-title">
                    {{ isset($address) ? 'Update Address' : 'Add Address' }}
                </h5>
            </div>

            <form action="{{ route('shipper.address-book.update', $address->id) }}" method="POST">
                @csrf
                @isset($address)
                    @method('PUT')
                @endisset

                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="name" class="form-label">COMPANY NAME</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $address->name ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="street_address" class="form-label">STREET ADDRESS</label>
                            <input type="text" class="form-control" name="street_address"
                                value="{{ old('street_address', $address->street_address ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="city" class="form-label">CITY</label>
                            <input type="text" class="form-control" name="city"
                                value="{{ old('city', $address->city ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">STATE/PROVINCE</label>
                            <input type="text" class="form-control" name="state"
                                value="{{ old('state', $address->state ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="postal_code" class="form-label">ZIP/POSTAL CODE</label>
                            <input type="number" class="form-control" name="postal_code"
                                value="{{ old('postal_code', $address->postal_code ?? '') }}">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="country" class="form-label">COUNTRY</label>
                            <select class="form-control" name="country">
                                <option value="mexico"
                                    {{ old('country', $address->country) == 'mexico' ? 'selected' : '' }}>Mexico
                                </option>
                                <option value="us"
                                    {{ old('country', $address->country) == 'us' ? 'selected' : '' }}>US</option>

                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-control" name="type">
                                <option value="pickup" {{ old('type', $address->type) == 'pickup' ? 'selected' : '' }}>
                                    Pickup</option>
                                <option value="delivery"
                                    {{ old('type', $address->type) == 'delivery' ? 'selected' : '' }}>Delivery</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                            <input type="text" class="form-control" name="contact_person_name"
                            value="{{ old('contact_person_name', $address->contact_person_name ?? '') }}">

                        </div>

                        <div class="mb-3 col-md-12">
                            <label for="phone" class="form-label">PHONE NUMBER</label>
                            <input type="number" class="form-control" name="phone"
                                value="{{ old('phone', $address->phone ?? '') }}">
                        </div>
                    </div>



                    <div class="text-center">
                        <button type="submit" class="submit-btn">
                            {{ isset($address) ? 'Update' : 'Submit' }}
                        </button>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>
