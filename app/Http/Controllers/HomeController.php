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
        $totalShippers = User::where('role', 'shipper')->count();
        $totalSubShippers = User::where('role', 'shipper_user')->count();

        $totalCarriers = User::where('role', 'carrier')->count();
        $totalSubCarriers = User::where('role', 'carrier_user')->count();
        return view('home', compact('totalShippers', 'totalSubShippers','totalCarriers','totalSubCarriers'));
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
