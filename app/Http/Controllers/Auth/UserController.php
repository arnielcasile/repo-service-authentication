<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UserService;
use App\Traits\ResponseTrait;

class UserController extends Controller
{

    use ResponseTrait, AuthenticatesUsers;

    protected $userService;

    public function __construct(UserService $userService)
    {
        // $this->middleware('auth:api');
        $this->userService = $userService;
    }

    public function index()
    {
        $result = $this->successResponse("Loaded Successfully", 200);
        try {
            $result["data"] = $this->userService->loadAll();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
    
    public function register(UserRequest $request)
    {
        $result = $this->successResponse("Successfully Registered", 200);
        try 
        {
            $data = [
                'emp_id'    => $request->emp_id,
                'password'  => bcrypt($request->password),
            ];
            $this->userService->store($data);
        } 
        catch (\Exception $e) 
        {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }
    // public function show($id)
    // {
    //     //
    // }


    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }

    public function getAuthUser()
    {
        $authUser = $this->guard()->user()->emp_id;
        $result = $this->successResponse("Load current user", 200);
        try {
            $result["data"] = $this->userService->getAuthUser($authUser);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }
        
        return $this->returnResponse($result);
        
    }
}
