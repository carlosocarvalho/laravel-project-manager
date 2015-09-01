<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 03:16
 */

namespace CocProject\Repositories;

use CocProject\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
   public function model(){
       return  User::class;
   }

    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
    /*
   public  function presenter(){
       return ClientPresenter::class;
   }*/
}