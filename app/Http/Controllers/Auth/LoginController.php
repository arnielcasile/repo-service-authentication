<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $maxLoginAttempts= 5;
    protected $lockoutTime= 300;

    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'emp_id'        => 'required',
            'password'      => 'required',
        ]);
        if ($validator->fails()){ return  $validator->errors(); } 
    
        $credentials = $request->only(['emp_id','password']);
        
        if ($this->hasTooManyLoginAttempts($request)) 
        {
            $this->fireLockoutEvent($request);
            return response()->json(['error' => 'Too many login attempts. Please try again in '.$this->decayMinutes().' minute.'], 400);
        }

        try {
            if ($token = $this->guard()->attempt($credentials)) {
                return $this->respondWithToken($token);
            }
            $this->incrementLoginAttempts($request);
            return response()->json(['error' => 'Invalid Credentials'], 401);
        } catch (\Exception $e) {
           return response()->json($e->getMessage(), 500);
        }  

    }

    public function authRefresh()
    {
        return $this->authServices->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
      return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60,
      ]);
    }
}
