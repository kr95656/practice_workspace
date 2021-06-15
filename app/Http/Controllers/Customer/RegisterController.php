<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\RegisterRequest;
use App\Models\Customer;
use App\Models\Employee;

class RegisterController extends Controller
{
    public function showRegisterCustomer ()
    {
        $employees = Employee::all();

        return view('customers.register_customer')
            ->with('employees', $employees);
    }

    public function registerCustomer (RegisterRequest $request)
    {
        $customer = new Customer();

        $customer->name            = $request->input('name');
        $customer->email           = $request->input('email');
        $customer->tel             = $request->input('tel');
        $customer->prefecture      = $request->input('prefecture');
        $customer->city            = $request->input('city');
        $customer->street          = $request->input('street');

        $customer->save();

        // 中間テーブル
        $employee_id = $request->input('employee_id');
        $customer->employees()->attach($employee_id);

        return redirect()->back()
            ->with('status', '顧客を登録しました。');
    }
}
