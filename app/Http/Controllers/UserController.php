<?php

namespace CocProject\Http\Controllers;

use CocProject\Entities\User;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class UserController extends Controller
{
     /**
     * @var UserRepository
     */
     private $repository;

     public  function __construct(User $repository){
         $this->repository = $repository;
     }

    public function authenticated(){

       return  $this->repository->find(1);
    }
}
