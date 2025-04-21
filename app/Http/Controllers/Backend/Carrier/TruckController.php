<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use App\Models\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plate_number' => 'required',
            'trucker_number' => 'required',
            'service_category' => 'required',
            'location' => 'required',
        ]);

        Truck::create($request->all());
        return redirect()->route('trucks.index');
    }

    public function edit($id)
    {
        $truck = Truck::findOrFail($id);
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plate_number' => 'required',
            'trucker_number' => 'required',
            'service_category' => 'required',
            'location' => 'required',
        ]);

        $truck = Truck::findOrFail($id);
        $truck->update($request->all());
        return redirect()->route('trucks.index');
    }

    public function destroy($id)
    {
        Truck::findOrFail($id)->delete();
        return redirect()->route('trucks.index');
    }
}
