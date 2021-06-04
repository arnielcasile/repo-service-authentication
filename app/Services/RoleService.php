<?php

namespace App\Services;

use App\Services\Contracts\RoleServiceContract;
use App\Repositories\Contracts\RoleContract as RoleRepositoryContract;


class RoleService implements RoleServiceContract
{
    protected $roleRepositoryContract;

    public function __construct(RoleRepositoryContract $roleRepositoryContract)
    {   
        $this->roleRepositoryContract = $roleRepositoryContract;
    }

    public function loadAll()
    {
        return $this->roleRepositoryContract->loadAllRoles();
    }

    public function store($data)
    {
        return $this->roleRepositoryContract->create($data);
    }
}
