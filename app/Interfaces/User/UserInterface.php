<?php

namespace App\Interfaces\User;

use Illuminate\Database\Eloquent\Model;

interface UserInterface
{
    public function module(): Model;

    public function searchByAccount($account);

}