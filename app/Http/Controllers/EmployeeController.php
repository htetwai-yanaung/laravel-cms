<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function createPage(){
        return view('employee.create');
    }

    public function list(){
        $employees = Employee::get();
        return view('employee.list')->with(['employees' => $employees]);
    }

    public function createEmployee(EmployeeRequest $request){
        Employee::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'job' => $request->job,
            'address' => $request->address,
            'age' => $request->age,
        ]);
        return redirect('employee/list');
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view('employee.edit')->with(['employee' => $employee]);
    }

    public function updateEmployee(EmployeeRequest $request, $id){
        $employee = [
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'job' => $request->job,
            'address' => $request->address,
            'age' => $request->age,
        ];
        Employee::where('id', $id)->update($employee);
        return redirect('employee/list');
    }

    public function deleteEmployee($id){
        Employee::where('id', $id)->delete();
        return redirect('employee/list');
    }

}
