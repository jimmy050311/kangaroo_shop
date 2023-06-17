<?php

namespace App\Repositories\User;

use App\Interfaces\User\UserInterface;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRepository extends Repository implements UserInterface
{
    public function module(): Model
    {
        return app(User::class);
    }
}