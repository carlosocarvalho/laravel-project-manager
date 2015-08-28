<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 12:08
 */

namespace CocProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

     protected  $rules = [
         'name'=>'required|max:255',
         'responsible'=>'required',
         'email'      =>'required|email',
         'phone'      =>'required',
         'address'    =>'required'
     ];
}