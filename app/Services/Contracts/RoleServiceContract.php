<?php

namespace App\Services\Contracts;


interface RoleServiceContract
{
    public function loadAll();

    public function store($data);
}
