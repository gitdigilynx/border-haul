<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\Carrier;
use App\Models\Driver;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            $trucks = Truck::with(['driver', 'carrier'])
                ->where('carrier_id', auth()->user()->carrier->id)
                ->orderBy('created_at', 'desc')
                ->get();

            // dd($trucks);

            return view('backend.carrier.truck.index', compact('trucks'));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function create()
    {
        return view('backend.carrier.truck.create');
    }
    public function store(Request $request)
    {
        try {

            $request->validate([
                'plate_number' => 'required|unique:trucks,plate_number',
                'trucker_number' => 'required|unique:trucks,trucker_number',
                'service_category' => 'required|string',
                'location' => 'required|string',
                'in_service' => 'required|boolean',

                'name' => 'required|string',
                'phone_number' => 'required|unique:drivers,phone_number',
            ]);

            $user = auth()->user();
            $carrier = $user->carrier;

            $driver = Driver::create([
                'carrier_id' => $carrier->id,
                'name' => $request->name,
                'phone_number' => $request->phone_number,
            ]);

            Truck::create([
                'carrier_id' => $carrier->id,
                'driver_id' => $driver->id,
                'plate_number' => $request->plate_number,
                'trucker_number' => $request->trucker_number,
                'service_category' => $request->service_category,
                'location' => $request->location,
                'in_service' => $request->in_service,
            ]);

            return redirect()->route('carrier.trucks')->with('success', 'Truck and driver created successfully!');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        try {
            $truck = Truck::findOrFail($id);
            return view('backend.carrier.truck.edit', compact('truck'));
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }

   public function update(Request $request, $id)
{
    try {
        $truck = Truck::findOrFail($id);
        $driver = $truck->driver; // Assuming a relationship exists between Truck and Driver

        // Validate truck and driver data
        $request->validate([
            'plate_number' => 'required|unique:trucks,plate_number,' . $truck->id,
            'trucker_number' => 'required|unique:trucks,trucker_number,' . $truck->id,
            'service_category' => 'required|string',
            'location' => 'required|string',
            'in_service' => 'required|boolean',
            'name' => 'required|string',
            'phone_number' => 'required|unique:drivers,phone_number,' . $driver->id,
        ]);

        // Update truck data
        $truck->update([
            'plate_number' => $request->plate_number,
            'trucker_number' => $request->trucker_number,
            'service_category' => $request->service_category,
            'location' => $request->location,
            'in_service' => $request->in_service,
        ]);

        // Update driver data
        $driver->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('carrier.trucks')->with('success', 'Truck and driver updated successfully!');
    } catch (\Exception $e) {
        flash()->error('Something went wrong: ' . $e->getMessage());
        return redirect()->back();
    }
}

    public function destroy($id)
    {
        try {
            $truck = Truck::findOrFail($id);
            $truck->delete();
            return redirect()->back()->with('success', 'Truck deleted successfully.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function toggleTruck(Request $request, Truck $truck)
    {
        try {
            $truck->in_service = $request->has('in_service');
            $truck->save();

            return back()->with('status', 'Truck service status updated.');
        } catch (\Exception $e) {
            flash()->error('Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
