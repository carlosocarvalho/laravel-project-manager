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

use \Illuminate\Contracts\Filesystem\Factory as Storage;
use \Illuminate\Filesystem\Filesystem;


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

    /**
     * @var Filesystem
     */
    protected  $filesystem;
    /**
     * @var Storage
     */
    protected  $storage;

    /**
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     * @param Filesystem $filesystem
     */
    function __construct(ProjectRepository $repository, ProjectValidator $validator, Filesystem $filesystem , Storage $storage){
         $this->repository = $repository;
         $this->validator = $validator;
         $this->filesystem = $filesystem;
         $this->storage = $storage;
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

    public function createFile($data = [] ){
        /*name,description, extension, file*/


        $project =  $this->repository->skipPresenter()->find($data['project_id']);
        $projectFileId =  $project->files()->create($data);
        return  $this->storage->put($projectFileId->id.'.'.$data['extension'], $this->filesystem->get($data['file']));

    }
}