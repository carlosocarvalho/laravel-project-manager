<?php

namespace CocProject\Entities;

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

    function projects(){
        return $this->hasMany(Project::class,'client_id','id');
    }
}
