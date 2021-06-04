<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stuff\Profile\EditRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function showEditProfile ()
    {
        return view('stuffs.edit_profile_form')
            // ->with('employee', Auth::employee());
            ->with('employee', Auth::user());
            // ->with('user', Auth::user());
    }

    public function editProfile(EditRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->save();

        return redirect()->back()
            ->with('status', 'プロフィールを変更しました。');

    }

}
