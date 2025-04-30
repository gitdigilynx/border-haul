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


    // public function index()
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();

    //         if ($user->hasRole('shipper')) {
    //             return view('home'); // Use a separate view for shippers
    //         }

    //         if ($user->hasRole('carrier')) {
    //             return view('home'); // Use a separate view for carriers
    //         }

    //         if ($user->hasRole('admin')) {
    //             return view('home'); // Optional: separate admin dashboard
    //         }
    //     }
    //     return redirect()->route('home');
    // }


}
