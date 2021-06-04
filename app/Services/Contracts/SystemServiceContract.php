<?php

namespace App\Services\Contracts;

interface SystemServiceContract
{
    public function loadAll();

    public function store(array $data);

}
