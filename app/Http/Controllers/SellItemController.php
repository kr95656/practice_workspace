<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellItemController extends Controller
{
    public function showItemRegisterForm () {
        return view('sell_item');
    }

}
