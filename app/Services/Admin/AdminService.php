<?php

namespace App\Services\Admin;

use App\Repositories\Admin\AdminRepository;
use App\Services\Service;

class AdminService extends Service
{
    protected $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchByAccount($account)
    {
        return $this->repository->searchByAccount($account);
    }
}