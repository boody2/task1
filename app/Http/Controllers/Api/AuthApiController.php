<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    use GeneralTrait;
    public function update_profile(Request $request, User $user)
    {
        $Validator = Validator::make($request->all(), [
            'name' => 'required',
            'password'=>  'nullable|min:8',
            'photo' => 'nullable',
        ]);
        if ($Validator->fails()) {
            return $this->returnError($Validator->errors(), $errNum = "404");
        }
        $path=null;
        if($request->hasFile('photo')){
            $path= Storage::putFile('employee',$request->file('photo'));

        }
        $user->update([
            'name' => $request->name,
            'password' => $request->password?Hash::make($request->password): $user->password,
            'photo' => $path??$user->photo,
        ]);
        return $this->returnData('user_data', $user);
    }
    public function login(Request $request)
    {
        $Validator = Validator::make($request->all(), [
           'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if ($Validator->fails()) {
            return $this->returnError($Validator->errors(), $errNum = "404");
        }
        $user=User::where('email','=',$request->email)->first();
        if(!$user){
            return $this->returnError(['Invalid email or password'], $errNum = "403");
        }
        if($user->status=="Blocked"){
            return $this->returnError(['Your account has been blocked'], $errNum = "403");
        }
        $token = JWTAuth::fromUser($user);
        return   response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => 'Success',
            'token' => $token,
            'user_data' => $user,
        ]);
    }
    public function logout(){
        Auth::logout();
        return $this->returnSuccessMessage('Logged out successfully');
    }
}

