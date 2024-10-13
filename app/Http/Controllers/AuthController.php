<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function cover()
    {
        if (Auth::check()) {
            return redirect()->route('invoice.index');
        } else {
            return redirect()->route('login');
        }
    }
    public function login_page()
    {
        return view('auth.login');
    }
    public function profile()

    {
        return view('auth.profile');
    }
    public function update_profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'password'=>  'nullable|min:8',
            'photo' => 'nullable',
        ]);
        $path=null;
        if($request->hasFile('photo')){
            $path= Storage::putFile('employee',$request->file('photo'));

        }

        $user->update([
            'name' => $request->name,
            'password' => $request->password?Hash::make($request->password): $user->password,
            'photo' => $path??$user->photo,
        ]);
        return redirect()->back()->with('success', 'Employee updated successfully');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user=User::where('email','=',$request->email)->first();
        if($user->status=="Blocked"){
            return back()->withErrors([
                "login" =>  "Your account has been blocked",
            ]);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('invoice.index');
        }
        return back()->withErrors([
            "login" => 'Invalid email or password'
        ]);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('cover');
    }
}
