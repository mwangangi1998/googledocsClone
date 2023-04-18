<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {
     $users=User::query()->get();
     return UserResource::collection($users);
}
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,User $user)
    {
        $created=User::query()->create([
            'name'=>$request->name,
            'password'=>$request->name,
            'email'=>$request->name,
        ]);
        if(!$created){
            return new JsonResponse([
                'error'=>'failed to create user'
            ],400);
        }
        return new JsonResponse(
            [
                'success'=>'user created successful'
            ]
            );


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return UserResource
     */
    public function show(User $user)
    {
       return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request,User $user)
    {
        $updated=$user->update([
        'name'=>$request->name??$user->name,
            'password'=>$request->password??$user->password,

    ]);
    if(!$request){
        return new JsonResponse(
            [
                'error'=>"failed to update user details"
            ],400
        );

    }
    return new JsonResponse([
        'data'=>$user
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( User $user)
    {
    $deleted=$user->forceDelete();
    if(!$deleted){
        return new JsonResponse([
            'error'=>'failed to delete user'
        ]);
    }
    return new JsonResponse([
        'success'=>'deleted successful'
    ]);
    }
}
