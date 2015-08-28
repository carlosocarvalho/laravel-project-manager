<?php

namespace CocProject\Http\Controllers;


use CocProject\Repositories\ProjectNoteRepository;
use CocProject\Services\ProjectNoteService;
use Illuminate\Http\Request;

use CocProject\Http\Controllers\Controller;



class ProjectNoteController extends Controller
{

    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service){
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($project_id)
    {
        return $this->repository->findWhere(['project_id'=>$project_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, $project_id, $id)
    {

        return $this->service->create(array_merge($request->all(),array('project_id'=>$project_id)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($project_id, $id)
    {
       return $this->repository->findWhere(['project_id'=>$project_id, 'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $project_id,$id)
    {
        $note =  $this->repository->findWhere(['project_id'=>$project_id, 'id'=>$id]);
        return $this->service->update(array_merge($request->all(),['project_id'=>$project_id]) , $note['0']->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($project_id,$id)
    {
        //
        $this->repository->find($id)->delete();

    }
}
