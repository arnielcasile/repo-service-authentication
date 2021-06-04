<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleAccessRequest;
use App\Services\RoleAccessService;
use App\Traits\ResponseTrait;

class RoleAccessController extends Controller
{

    use ResponseTrait;

    protected $roleAccessService;

    public function __construct(RoleAccessService $roleAccessService)
    {
        // $this->middleware('auth:api');
        $this->roleAccessService = $roleAccessService;
    }
   
    public function index()
    {
        $result = $this->successResponse("All Role Access Loaded Successfully", 200);
        try {
            $result["data"] = $this->roleAccessService->loadAll();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

   
    public function store(RoleAccessRequest $request)
    {
        $result = $this->successResponse("Role Access Inserted Successfully",200);
        try {
            $data = [
                'system_access_id'   => $request->system_access_id,
                'role_id'            => $request->role_id,
            ];
            $this->roleAccessService->store($data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

  
    public function show($id)
    {
        //
    }


    public function update(RoleAccessRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
