<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Truck;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class DriverController extends Controller
{
    public function index()
    {
       try {
            $user = auth()->user();
            $drivers = Driver::with('carrier')
                ->where('carrier_id', $user->carrier->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('backend.carrier.driver.index', compact('drivers'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone_number' => 'required|unique:drivers,phone_number',
                // 'truck_id' => 'nullable|exists:trucks,id',
            ]);

            $user = auth()->user();
            $carrier = $user->carrier;

            Driver::create([
                'carrier_id' => $carrier->id,
                'name' => $request->name,
                'phone_number' => $request->phone_number,
            ]);

            return redirect()->back()->with('success', 'Driver created successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try {
            $driver = Driver::findOrFail($id);
            return view('backend.carrier.driver.edit', compact('driver'));
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone_number' => 'required|unique:drivers,phone_number,' . $id,
                // 'truck_id' => 'nullable|exists:trucks,id',
            ]);

            $driver = Driver::findOrFail($id);
            $driver->update($request->all());

            return redirect()->back()->with('success', 'Driver updated successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $driver = Driver::findOrFail($id);
            $driver->delete();
            return redirect()->back()->with('success', 'Driver deleted successfully.');
        } catch (\Exception $e) {
            Flasher::addError('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
