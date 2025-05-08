<?php

namespace App\Http\Controllers\Backend\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressBook;
use App\Http\Requests\StoreAddressBook;
use Flasher\Laravel\Facade\Flasher;

class AddressBookController extends Controller
{
    public function index()
    {
        // $user = auth()->user();

        // if (!$user || !$user->shipper) {
        //     abort(403, 'No associated shipper found.');
        // }
        // $addressBook = AddressBook::with('shipper')
        //     ->where('shipper_id', $user->shipper->id)
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        // $shipperId = auth()->id();
        // $addressBook = AddressBook::with('users')
        //     ->where('shipper_id', $shipperId)
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        $addressBook = AddressBook::get();
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
            $shipperId = $user && $user->shipper ? $user->shipper->id : $request->shipper_id;

            AddressBook::create([
                'shipper_id' => $shipperId,
                'name' => $request->name,
                'phone' => $request->phone,
                'street_address' => $request->street_address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'type' => $request->type,
                'contact_person_name' => $request->contact_person_name,
            ]);

            return redirect()->back()->with('success', 'Address created successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $address = AddressBook::findOrFail($id);
            return view('backend.shipper.address-book.edit', compact('address'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
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
                'contact_person_name' => 'nullable|string|max:25',
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
                'contact_person_name' => $request->contact_person_name,
            ]);

            return redirect()->back()->with('success', 'Address updated successfully!');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        try {
            $address = AddressBook::findOrFail($id);
            return view('backend.shipper.address-book.show', compact('address'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $addressBook = AddressBook::findOrFail($id);
            $addressBook->delete();
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
