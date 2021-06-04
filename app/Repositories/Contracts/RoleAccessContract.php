<?php

namespace App\Repositories\Contracts;

interface RoleAccessContract
{
    public function loadAllRoleAccess();

    public function create(array $data);
}