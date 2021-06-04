<?php

namespace App\Repositories\Contracts;

interface SystemContract 
{
    public function loadAll();

    public function create(array $data);
}