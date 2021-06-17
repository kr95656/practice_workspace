<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function showCustomers ()
    {
        $employees_id = Auth::id();

        // $employee_customers_null = Customer::where('name', '=', '')->get(); // 空のCollection
        $is_employee_customers = Customer::with('employees')
            ->find($employees_id);
        // dd($is_employee_customers);

        // $employee_customers_null = Customer::with(['employees' => function ($query) {
        //     $query->where('name', '=', '');
        //     // $query->find($employees_id);
        // }])->get();
        // dd($employee_customers_null);


        if ($is_employee_customers === null) {
            $is_not_customers = '現在担当している顧客はいません。';

            return view('stuffs.charge_customer')
            ->with('is_not_customers', $is_not_customers)
            ->with('is_employee_customers', $is_employee_customers);

        } else {
            $employee_customers = Customer::with('employees')
            ->find($employees_id)
            ->orderBy('id', 'DESC')
            ->paginate(10);

            return view('stuffs.charge_customer')
             ->with('employee_customers', $employee_customers)
             ->with('is_employee_customers', $is_employee_customers);
        }

    }

    // 解決したいEloquent Modelをタイプヒンティング
    public function showCustomerDetails (Customer $customer)
    {
        $employees_id = Auth::id();

        $employee_customers = Customer::with('employeesLog')
        ->find($employees_id);
        // $employee_customers = Customer::find($customer->id)
        //                         ->employeesLogs()
        //                         ->first();
        // dd(Customer::find(1)->employeeLogs);
        // App\Models\Customer::find(3)->customerLogs[1]->log
        return view('stuffs.details_charge_customer')
            ->with('customer', $customer)
            ->with('employee_customers', $employee_customers);
    }

}
