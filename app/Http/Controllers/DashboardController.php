<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request) {

        $user = Auth::user();

        if ($user) {
            return view('dashboard', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }
}
