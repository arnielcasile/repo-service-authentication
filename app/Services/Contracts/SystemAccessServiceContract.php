<?php

namespace App\Services\Contracts;


interface SystemAccessServiceContract
{
    public function loadAll();

    public function store(array $data);
}
