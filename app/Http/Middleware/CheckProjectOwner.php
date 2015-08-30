<?php

namespace CocProject\Http\Middleware;

use Closure;
use CocProject\Repositories\ProjectRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class CheckProjectOwner
{
     private $repository;

    public function __construct(ProjectRepository $repository){ $this->repository = $repository;}

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! $this->repository->isOwner($request->project, Authorizer::getResourceOwnerId()))
            return ['success'=> false];

        return $next($request);
    }
}
