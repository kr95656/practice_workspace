<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredItemsController extends Controller
{
    public function showRegisteredItems()
    {
        $employee = Auth::user();

        $items = $employee->registeredItems()
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('stuffs.registered_items')
            ->with('items', $items)
            ->with('employee', $employee);
    }
}
