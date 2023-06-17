<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\AdminInterface;
use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class AdminRepository extends Repository implements AdminInterface
{
    public function module(): Model
    {
        return app(Admin::class);
    }

    public function searchByAccount($account)
    {
        return $this->module()->where('account', $account)->first();
    }
}