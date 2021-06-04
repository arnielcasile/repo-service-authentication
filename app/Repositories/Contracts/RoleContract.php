<?php

namespace App\Repositories\Contracts;

interface RoleContract 
{
    public function loadAllRoles();

    public function create(array $data);
}