<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        return view('home.employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>  'required|min:8',
            'photo' => 'nullable',
            'type'=>'required'
        ]);
        $path=null;
        if($request->hasFile('photo')){
            $path= Storage::putFile('employee',$request->file('photo'));

        }
        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $path,
            'type' => $request->type
        ]);
        return redirect()->route('employee.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return view('home.employee_edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name' => 'required',
            'password'=>  'nullable|min:8',
            'photo' => 'nullable',
            'type'=>'required'
        ]);
        $path=null;
        if($request->hasFile('photo')){
            $path= Storage::putFile('employee',$request->file('photo'));

        }

        $employee->update([
            'name' => $request->name,
            'password' => $request->password?Hash::make($request->password): $employee->password,
            'photo' => $path??$employee->photo,
            'type' => $request->type
        ]);
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->update([
            'status' => "Blocked"
        ]);
        
        return redirect()->route('employee.index')->with('success', 'Employee blocked successfully');
    }
}
