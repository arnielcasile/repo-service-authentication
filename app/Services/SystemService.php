<?php

namespace App\Services;

use App\Services\Contracts\SystemServiceContract;
use App\Repositories\Contracts\SystemContract as SystemRepositoryContract;


class SystemService implements SystemServiceContract
{
    protected $systemServiceContract;

    public function __construct(SystemRepositoryContract $systemServiceContract)
    {
        $this->systemServiceContract = $systemServiceContract;
    }

    public function loadAll()
    {
        return $this->systemServiceContract->loadAll();
    }

    public function store($data)
    {
        return $this->systemServiceContract->create($data);
    }
}
