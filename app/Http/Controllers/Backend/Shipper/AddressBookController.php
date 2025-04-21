<?php

namespace App\Http\Controllers\Backend\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressBook;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressBook;

class AddressBookController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $addressBook = AddressBook::with('shipper')
            ->where('shipper_id', $user->shipper->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.shipper.address-book.index', compact('addressBook'));
    }


    public function create()
    {
        //
    }

    public function store(StoreAddressBook $request)
    {
        try {

        $user = auth()->user();
        $shipper = $user->shipper;

        AddressBook::create([
                'shipper_id' => $shipper->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'type' => $request->type,
            ]);

            return to_route('shipper.address-book')->with('success', 'Address created successfully!');;
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return to_route('shipper.address-book');
        }
    }

    public function edit($id)
    {
        $address = AddressBook::findOrFail($id);
        return view('backend.shipper.address-book.edit', compact('address'));
    }
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'name' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:15',
                'street_address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'nullable|string|max:100',
                'postal_code' => 'nullable|string|max:20',
                'country' => 'nullable|string|max:100',
                'type' => 'required|in:pickup,delivery',
            ]);

            // Find the address record
            $address = AddressBook::findOrFail($id);

            // Update the address
            $address->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'type' => $request->type,
            ]);

            return to_route('shipper.address-book')->with('success', 'Address updated successfully!');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return to_route('shipper.address-book');
        }
    }

    public function show($id)
    {
        $address = AddressBook::findOrFail($id);
        return view('backend.shipper.address-book.show', compact('address'));
    }

    public function destroy($id)
    {
        try {
            $addressBook = AddressBook::findOrFail($id);
            $addressBook->delete();
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}
