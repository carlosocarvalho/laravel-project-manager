<?php

namespace CocProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'due_date',
        'progress',
        'status'
    ];



    public function notes(){

        return $this->hasMany(ProjectNote::class);
    }

    public function files(){
        return $this->hasMany(ProjectFile::class);
    }

    public  function members(){
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }
}
