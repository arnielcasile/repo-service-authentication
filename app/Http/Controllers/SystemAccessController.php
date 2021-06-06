<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemAccessRequest;
use App\Services\SystemAccessService;
use App\Traits\ResponseTrait;

class SystemAccessController extends Controller
{

    use ResponseTrait;

    protected $systemAccessService;

    public function __construct(SystemAccessService $systemAccessService)
    {
        $this->middleware('auth:api');
        $this->systemAccessService = $systemAccessService;
    }
  
    public function index()
    {
        $result = $this->successResponse("System Access Loaded Successfully", 200);
        try {
            $result["data"] = $this->systemAccessService->loadAll();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

    public function store(SystemAccessRequest $request)
    {
        $result = $this->successResponse("System Access Inserted Successfully",200);
        try {
            $data = [
                'user_id'     => auth()->guard()->user()->id,
                'emp_id'      => auth()->guard()->user()->emp_id,
                'system_id'   => $request->system_id,
                'status'      => $request->status,
            ];
            $this->systemAccessService->store($data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }


    public function show($id)
    {
        //
    }

    public function update(SystemAccessRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
