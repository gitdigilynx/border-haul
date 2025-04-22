<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use App\Models\Carrier;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        try {
            $user = auth()->user();
            $trucks = Truck::with('carrier')
                ->where('carrier_id', $user->carrier->id)
                ->orderBy('created_at', 'desc')
                ->get();
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
            ]);

            $user = auth()->user();
            $carrier = $user->carrier;

            Truck::create([
                'carrier_id' => $carrier->id,
                'plate_number' => $request->plate_number,
                'trucker_number' => $request->trucker_number,
                'service_category' => $request->service_category,
                'location' => $request->location,
                'in_service' => $request->in_service,
            ]);

            return redirect()->route('carrier.trucks')->with('success', 'Truck created successfully!');
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

            $request->validate([
                'plate_number' => 'required|unique:trucks,plate_number,' . $truck->id,
                'trucker_number' => 'required|unique:trucks,trucker_number,' . $truck->id,
                'service_category' => 'required|string',
                'location' => 'required|string',
                'in_service' => 'required|boolean'
            ]);

            $truck->update([
                'plate_number' => $request->plate_number,
                'trucker_number' => $request->trucker_number,
                'service_category' => $request->service_category,
                'location' => $request->location,
                'in_service' => $request->in_service,
            ]);

            return redirect()->route('carrier.trucks')->with('success', 'Truck update successfully!');
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
