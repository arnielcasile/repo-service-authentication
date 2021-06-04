<?php

namespace App\Services;

use App\Services\Contracts\SystemAccessServiceContract;
use App\Repositories\Contracts\SystemAccessContract as SystemAccessRepositoryContract;


class SystemAccessService implements SystemAccessServiceContract
{
    protected $systemAccessRepoContract;

    public function __construct(SystemAccessRepositoryContract $systemAccessRepoContract)
    {
        $this->systemAccessRepoContract = $systemAccessRepoContract;
    }

    public function loadAll()
    {
        $result = $this->systemAccessRepoContract->loadAllSystemAccess();
        $datastorage = [];
        foreach ($result as $value) {
            $datastorage[] = [
                "id"            => $value->id,
                "status"        => $value->status,
                "emp_id"        => $value->user->emp_id,
                "abbreviation"  => $value->system->abbreviation,
                "name"          => $value->system->name
            ];
        }

        return $datastorage;
    }

    public function store($data)
    {
        return $this->systemAccessRepoContract->create($data);
    }
}
