<?php

namespace App\Http\Controllers\Backend\Carrier;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Enums\RoleEnum;


class CarrierDashboardController extends Controller
{
    public function index()
    {
        $totalCarriers = User::where('role', 'Carrier')->count();
        $totalSubCarriers = User::where('role', 'CarrierUser')->count();

        return view('backend.carrier.dashboard', compact('totalCarriers', 'totalSubCarriers'));
    }

}




