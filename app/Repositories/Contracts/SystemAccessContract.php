<?php

namespace App\Repositories\Contracts;


interface SystemAccessContract 
{
    public function loadAllSystemAccess();

    public function create(array $data);
}