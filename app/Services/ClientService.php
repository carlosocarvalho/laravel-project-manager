<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 11:50
 */

namespace CocProject\Services;


use CocProject\Repositories\ClientRepository;
use CocProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
    /**
     * @var ClientRepository
     */
     protected $repository;

    /**
     * @var ClientValidator
     */
    protected $validator;

     function __construct(ClientRepository $repository, ClientValidator $validator){
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