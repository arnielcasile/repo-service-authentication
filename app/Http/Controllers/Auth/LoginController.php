<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $maxLoginAttempts= 5;
    protected $lockoutTime= 300;

    public function __construct()
    {
        $this->middleware('auth:api',['except' => 'login']);
    }

    public function login(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'emp_id'        => 'required',
            'password'      => 'required',
        ]);
        if ($validator->fails())
        { 
            return response()->json($validator->errors(), 400); 
        } 
        if ($this->hasTooManyLoginAttempts($request)) 
        {
            $this->fireLockoutEvent($request);
            return response()->json(['error' => 'Too many login attempts. Please try again in '.$this->decayMinutes().' minute.'], 400);
        }

        $token_validity = 24 * 60;
        $this->guard()->factory()->setTTL($token_validity);

        try {
            if (!$token = $this->guard()->attempt($validator->validate())) {
                
                $this->incrementLoginAttempts($request);
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return $this->respondWithToken($token);
        } catch (\Exception $e) {
           return response()->json($e->getMessage(), 500);
        }  

    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json(['message' => 'User LogOut Successfully ']);
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
