<?php

namespace App\Repositories\Contracts;

interface UserContract 
{
    public function loadAll();

    public function create(array $data);

    public function getUser($empid);
}