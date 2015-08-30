<?php
/**
 * Created by PhpStorm.
 * User: carlosocarvalho
 * Date: 28/08/2015
 * Time: 23:06
 */

namespace CocProject\Transformers;

use CocProject\Entities\Project;
use League\Fractal\TransformerAbstract;
use \CocProject\Transformers\ProjectMemberTransformer;

class ProjectTransformer extends  TransformerAbstract
{
     protected $defaultIncludes = ['members'];

    public function transform(Project $project){

        return [
          'project_id'=> $project->id,
          'project'   => $project->name,
          'description' => $project->description,
          'progress'    => $project->progress,
            'status'    => $project->status,
            'due_date'    => $project->due_date
        ];
    }


    public function includeMembers(Project $project){

        return $this->collection($project->members, new ProjectMemberTransformer());
    }
}