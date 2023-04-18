<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Models\User;
use App\Http\Requests\UpdatePostRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsoNResponse
     */
    public function index()
    {
     $users=User::query()->get();
     return new JsonResponse([
        'data'=>$users
     ]);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
       return new JsonResponse (
        [
            'data'=>$user
        ]
        );
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
