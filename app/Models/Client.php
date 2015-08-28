<?php

namespace CocProject\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'name',
        'email',
        'address',
        'responsible',
        'obs',
        'phone',
    ];
}
