<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Enums\RoleEnum;

class HomeController extends Controller
{
    public function index()
    {
        $totalShippers = User::where('role', 'Shipper')->count();
        $totalSubShippers = User::where('role', 'ShipperUser')->count();

        $totalCarriers = User::where('role', 'Carrier')->count();
        $totalSubCarriers = User::where('role', 'CarrierUser')->count();

        $totalSubAdmin = User::where('role', 'subAdmin')->count();

        return view('home', compact('totalShippers', 'totalSubShippers','totalCarriers','totalSubCarriers','totalSubAdmin'));
    }


}
