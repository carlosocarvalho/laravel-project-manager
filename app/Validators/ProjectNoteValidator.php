<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 12:08
 */

namespace CocProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

     protected  $rules = [
         'note'=>'required',
         'project_id'=>'required|integer',
         'title'      =>'required',

     ];
}