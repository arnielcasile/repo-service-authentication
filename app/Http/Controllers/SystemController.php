<?php

namespace App\Http\Controllers;

use App\Http\Requests\SystemRequest;
use App\Services\SystemService;
use App\Traits\ResponseTrait;

class SystemController extends Controller
{

    use ResponseTrait;

    protected $systemService;

    public function __construct(SystemService $systemService)
    {
        // $this->middleware('auth:api');
        $this->systemService = $systemService;
    }
   
    public function index()
    {
        $result = $this->successResponse("All System Loaded Successfully", 200);
        try {
            $result["data"] = $this->systemService->loadAll();
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }
        return $this->returnResponse($result);
    }

  
    public function store(SystemRequest $request)
    {
        $result = $this->successResponse("System Inserted Successfully",200);
        try {
            $data = [
                'abbreviation'      => $request->abbreviation,
                'name'              => $request->name,
                'reference_code'    => $request->reference_code,
                'reference_number'  => $request->reference_number,
                'description'       => $request->description,
                'date_inserted'     => $request->date_inserted,
                'date_updated'      => $request->date_updated,
                'status'            => $request->status,
                'section_owner'     => $request->section_owner
            ];
            $this->systemService->store($data);
        } catch (\Exception $e) {
            $result = $this->errorResponse($e);
        }

        return $this->returnResponse($result);
    }

 
    public function show($id)
    {
        //
    }

  
    public function update(SystemRequest $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
