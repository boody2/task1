<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                // احصل على بيانات المستخدم وقم بتعيينها إلى $ user
                return response()->json([
                    'errcode' => 1004,
                    'msg' => 'لا يوجد مثل هذا المستخدم'

                ], 404);
            }
        return $next($request);

    } catch (TokenExpiredException $e) {

            return response()->json([
                'errcode' => 1003,
                'msg' => "الرمز المميز منتهي الصلاحية" , // انتهت صلاحية الرمز المميز
            ], 404);

        } catch (TokenInvalidException $e) {

            return response()->json([
                'errcode' => 1002,
                'msg' => "الرمز غير صالح",  // الرمز غير صالح
            ], 404);

        } catch (JWTException $e) {

            return response()->json([
                'errcode' => 1001,
                'msg' => "رمز مفقود" , // رمز فارغ
            ], 404);

        }
    }
}
