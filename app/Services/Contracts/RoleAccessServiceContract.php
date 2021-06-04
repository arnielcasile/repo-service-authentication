<?php

namespace App\Services\Contracts;


interface RoleAccessServiceContract
{
    public function loadAll();

    public function store($data);
}
