<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Employeecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::all();
        return view('employee.employee', compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.addem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone_number' => 'required|min:9',
            'image' => 'required'
        ]);
        $employees = new Employee;
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->email = $request->email;
        $employees->gender = $request->gender;
        $employees->birthday = $request->birthday;
        $employees->phone_number = $request->phone_number;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('images/employee/', $filename);
            $employees->image = $filename;
        }
        $employees->save();
        // return $employees;
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.employee', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        return view('employee.editem', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required|min:9',
        ]);
        $employees = Employee::find($id);
        $employees->first_name = $request->first_name;
        $employees->last_name = $request->last_name;
        $employees->email = $request->email;
        $employees->gender = $request->gender;
        $employees->birthday = $request->birthday;
        $employees->phone_number = $request->phone_number;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('images/employee/', $filename);
            $employees->image = $filename;
        }
        $employees->update();
        // return $employees;
        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employees = Employee::find($id);
        $employees->delete();
        return back()->with('Success', 'User delete successfully');
    }
}
