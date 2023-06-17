<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        "id", 
        "name", 
        "account", 
        "password", 
        "phone", 
        "email", 
        "verify_id", 
        "status"
    ];
}
