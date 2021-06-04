<?php

namespace App\Repositories;

use App\Models\RoleAccess;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\RoleAccessContract;


class RoleAccessRepository extends BaseRepository implements RoleAccessContract
{
    protected $model;

    public function __construct(RoleAccess $model)
    {
        $this->model = $model;
    }
}
