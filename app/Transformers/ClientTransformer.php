<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 23:06
 */

namespace CocProject\Transformers;


use CocProject\Entities\Client;
use League\Fractal\TransformerAbstract;


class ClientTransformer extends  TransformerAbstract
{

    public function transform(Client $client){

        return [
          'id'=> $client->id,
          'name'   => $client->name,
          'address' => $client->address,
          'email' => $client->email,
          'responsible' => $client->responsible,
          'phone'     => $client->phone
        ];
    }


}