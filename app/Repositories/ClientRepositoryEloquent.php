<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 03:16
 */

namespace CocProject\Repositories;

use CocProject\Entities\Client;

use CocProject\Presenters\ClientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
   public function model(){
       return Client::class;
   }

    /*
   public  function presenter(){
       return ClientPresenter::class;
   }*/
}