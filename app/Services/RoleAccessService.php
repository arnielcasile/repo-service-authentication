<?php

namespace App\Services;

use App\Services\Contracts\RoleAccessServiceContract;
use App\Repositories\Contracts\RoleAccessContract as RoleAccessRepositoryContract;


class RoleAccessService implements RoleAccessServiceContract
{
    protected $roleAccessRepositoryContract;

    public function __construct(RoleAccessRepositoryContract $roleAccessRepositoryContract)
    {
        $this->roleAccessRepositoryContract = $roleAccessRepositoryContract;
    }

    public function loadAll()
    {
        return $this->roleAccessRepositoryContract->loadAllRoleAccess();
    }

    public function store($data)
    {
        return $this->roleAccessRepositoryContract->create($data);
    }
}
