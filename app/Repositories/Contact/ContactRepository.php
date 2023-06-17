<?php

namespace App\Repositories\Contact;

use App\Interfaces\Contact\ContactInterface;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Repository;

class ContactRepository extends Repository implements ContactInterface
{
    public function module(): Model
    {
        return app(Contact::class);
    }
}