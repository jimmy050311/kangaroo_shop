<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\Service;

class UserService extends Service
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}