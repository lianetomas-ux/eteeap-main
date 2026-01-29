<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('forms.information', compact('user'));
    }
}
