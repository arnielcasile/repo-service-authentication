<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use App\Traits\ResponseTrait;

class RoleController extends Controller
{

    use ResponseTrait;

    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->middleware('auth:api');
        $this->roleService = $roleService;
    }

    public function index()
    {
        $result = $this->successResponse("All Roles Loaded Successfully", 200);
        try {
            $result["data"] = $this->roleService->loadAll();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }


    public function store(RoleRequest $request)
    {
        $result = $this->successResponse("Role Inserted Successfully",200);
        try {
            $data = [
                'system_id'   => $request->system_id,
                'role'        => $request->role,
                'description' => $request->description,
            ];
            $this->roleService->store($data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    public function show($id)
    {
        //
    }

    public function update(RoleRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
