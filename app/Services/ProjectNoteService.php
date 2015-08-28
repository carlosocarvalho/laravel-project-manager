<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 11:50
 */

namespace CocProject\Services;


use CocProject\Validators\ProjectNoteValidator;
use CocProject\Repositories\ProjectNoteRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
    /**
     * @var ProjectNoteRepository
     */
     protected $repository;

    /**
     * @var ProjectNoteValidator
     */
    protected $validator;

     function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator){
         $this->repository = $repository;
         $this->validator = $validator;
     }

     public  function create(array $data){

         try{

             $this->validator->with($data)->passesOrFail();
             return $this->repository->create($data);
         }catch (ValidatorException $e){

             return ['error'=>true,'message'=> $e->getMessageBag()];
         }

     }

    public  function update(array $data, $id){
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){

            return ['error'=>true,'message'=> $e->getMessageBag()];
        }

    }
}