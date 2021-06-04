<?php

namespace App\Repositories\Contracts;

interface BaseContract 
{
    public function loadAll();

    public function loadAllSystemAccess();

    public function loadAllRoles();

    public function loadAllRoleAccess();

    public function getUser($empid);

    public function create(array $data);
}