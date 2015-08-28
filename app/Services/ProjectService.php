<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 11:50
 */

namespace CocProject\Services;


use CocProject\Repositories\ProjectRepository;
use CocProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    /**
     * @var ProjectRepository
     */
     protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

     function __construct(ProjectRepository $repository, ProjectValidator $validator){
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

    public  function udpate(array $data, $id){
        try{

            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){

            return ['error'=>true,'message'=> $e->getMessageBag()];
        }

    }
}