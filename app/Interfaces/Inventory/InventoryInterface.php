<?php

namespace App\Interfaces\Inventory;

use Illuminate\Database\Eloquent\Model;

interface InventoryInterface
{
    public function module(): Model;
}