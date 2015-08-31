<?php

namespace CocProject\Http\Controllers;


use CocProject\Repositories\ProjectRepository;
use CocProject\Services\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CocProject\Http\Controllers\Controller;



class ProjectController extends Controller
{


    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var ProjectService
     */
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service){
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //return $this->repository->findWhere(['owner_id'=>Authorizer::getResourceOwnerId()]);
        return  $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
     // if( ! $this->hasAccessPermissions($id) )return['error'=>'Access Forbidden'];
      return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //$Project =  $this->repository->find($id);
       // if( ! $this->checkOwner($id) )return['error'=>'Access Forbidden'];
        $this->service->update($request->all() , $id);

        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        //if( ! $this->checkOwner($id) )return['error'=>'Access Forbidden'];
        $this->repository->find($id)->delete();

    }

    /**
     * @param $projectId
     * @return mixed
     */
    private function checkOwner($projectId){
        return $this->repository->isOwner($projectId, Authorizer::getResourceOwnerId());
    }

    /**
     * @param $projectId
     * @return mixed
     */
    private function checkMember($projectId){
        return $this->repository->hasMember($projectId, Authorizer::getResourceOwnerId());
    }

    /**
     * @param $projectId
     * @return bool
     */
    private function hasAccessPermissions( $projectId){

        if( $this->checkOwner($projectId) or $this->checkMember($projectId))
               return true;

        return false;
    }
}
