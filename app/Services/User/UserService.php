<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\Service;
use Exception;

class UserService extends Service
{
    protected $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function searchByAccount($account, $password)
    {
        $user = $this->repository->searchByAccount($account);

        if(empty($user)) {
            throw new Exception('查無此帳號');
        }

        if($user->password != $password) {
            throw new Exception('密碼輸入錯誤');
        }

        return $user;
    }
}