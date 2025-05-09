<?php

namespace App\Http\Controllers\Backend\Shipper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;

class ShipperDashboardController extends Controller
{
    public function index()
    {
        $totalSubShippers = User::where('role', 'Shipper')->count();
        $totalShippers = User::where('role', 'Shipper')->count();

        return view('backend.shipper.dashboard', compact('totalSubShippers', 'totalShippers'));
    }
}
