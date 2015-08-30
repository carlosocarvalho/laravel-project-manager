<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 23:06
 */

namespace CocProject\Transformers;



use CocProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends  TransformerAbstract
{

    public function transform(User $member){

        return [
          'id'=> $member->id,
          'name'=> $member->name,
        ];
    }
}