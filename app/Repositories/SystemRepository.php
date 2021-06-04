<?php

namespace App\Repositories;

use App\Models\System;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\SystemContract;

class SystemRepository extends BaseRepository implements SystemContract
{

    protected $model;
    
    public function __construct(System $model)
    {
        $this->model = $model;
    }
}
