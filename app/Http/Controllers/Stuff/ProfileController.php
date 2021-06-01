<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showEditProfile ()
    {
        return view('stuffs.edit_profile_form')
            ->with('employee', Auth::employee());
            // ->with('user', Auth::user());
    }
}
