<?php

namespace App\Http\Controllers\Stuff;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerLog;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\Stuff\Customer\LogRequest;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    public function showCustomers ()
    {
        $employees_id = Auth::id();

        $is_employee_customers = Employee::find($employees_id);

        // 担当顧客の有無チェック
        if ($is_employee_customers === null) {
            $is_not_customers = '現在担当している顧客はいません。';

            return view('stuffs.charge_customer')
                ->with('is_not_customers', $is_not_customers)
                ->with('is_employee_customers', $is_employee_customers);

        } else {
            $employee_customers = Employee::find($employees_id)
                ->customers()
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
        return view('stuffs.details_charge_customer')
            ->with('customer', $customer);
    }

    // ログ作成画面
    public function showLogsCustomer ($id)
    {
        return view('stuffs.create_log')
            ->with('id', $id);
    }

    //ログ作成機能
    public function postLogsCustomer (LogRequest $request, $id)
    {
        $log = new CustomerLog();

        // 従業員id
        $employee_id = Auth::id();

        // 顧客id
        $customer_id = $id;

        $log->log          = $request->input('log');
        $log->customer_id  = $customer_id;
        $log->employee_id  = $employee_id;
        $log->save();

        return redirect()->route('stuffs.details-charge-customer', ['customer' => $customer_id])
            ->with('status', 'メモを追加しました。');
    }

    // ログ編集画面
    public function showEditLogsCustomer ($customer, $id)
    {
        $log = CustomerLog::find($id);

        return view('stuffs.edit_log')
            ->with('log',$log);
    }

    // ログ更新機能
    public function updateLogsCustomer (LogRequest $request)
    {
        $log = CustomerLog::findOrFail($request->id);

        $customer_id = $log->customer_id;

        $log->log          = $request->input('log');

        $log->update();

        return redirect()->route('stuffs.details-charge-customer', ['customer' => $customer_id])
            ->with('status', 'メモを編集しました。');
    }

    // ログ削除確認画面
    public function showDeleteLogsCustomer ($customer, $id)
    {
        $log = CustomerLog::find($id);

        return view('stuffs.delete_log')
            ->with('log',$log);
    }

    // ログ削除機能
    public function deleteLogsCustomer (Request $request)
    {
        $log = CustomerLog::findOrFail($request->id);

        $customer_id = $log->customer_id;

        $log->delete();

        return redirect()->route('stuffs.details-charge-customer', ['customer' => $customer_id])
            ->with('status', 'メモを削除しました。');
    }
}
