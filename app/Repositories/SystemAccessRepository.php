<?php

namespace App\Repositories;

use App\Models\SystemAccess;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\SystemAccessContract;

class SystemAccessRepository extends BaseRepository implements SystemAccessContract
{
    protected $model;

    public function __construct(SystemAccess $model)
    {
        $this->model = $model;
    }
}
