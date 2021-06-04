<?php

namespace App\Services;

use App\Services\Contracts\UserServiceContract;
use App\Repositories\Contracts\UserContract as UserRepositoryContract;


class UserService implements UserServiceContract
{
    protected $userRepoContract;

    public function __construct(UserRepositoryContract $userRepoContract)
    {
        $this->userRepoContract = $userRepoContract;
    }

    public function loadAll()
    {
        return $this->userRepoContract->loadAll();
    }
    
    public function store($data)
    {
        return $this->userRepoContract->create($data);
    }

    public function getAuthUser($empid)
    {
        return $this->userRepoContract->getUser($empid);
    }
}
