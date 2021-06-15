<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function showCustomers ()
    {

        $employees_id = Auth::id();
        $employee_customers = Customer::with('employees')
            ->find($employees_id)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('customers.customers')
             ->with('employee_customers', $employee_customers);
    }
}
