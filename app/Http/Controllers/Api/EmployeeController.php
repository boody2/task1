<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        return $this->returnData('Employee',$employees);
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
        $Validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password'=>  'required|min:8',
            'photo' => 'nullable',
            'type'=>'required'
         ]);
         if ($Validator->fails()) {
             return $this->returnError($Validator->errors(), $errNum = "404");
         }
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
        return $this->returnSuccess('Employee created successfully', $errNum = "200");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  User $employee)
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
