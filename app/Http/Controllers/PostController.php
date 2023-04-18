<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
$posts=Post::query()->get();
        return new JsonResponse([
            'data'=>$posts
 ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePostRequest $request)
    {
        $created = DB::transaction(function () use ($request) {
            $created = Post::query()->create(
                [
                    'title' => $request->title,
                    'body' => $request->body,
                ]
            );
            $created->users()->sync($request->use_ids);
            return $created;

        });
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {

return  new JsonResponse(
    [
        'data'=>$post
    ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request ,Post $post)
    {

               $updated=$post->update([

        'title'=>$request->title ?? $post->title,
            'body'=>$request->body ?? $post->body,
        ]
       ) ;
    if(!$updated){
        return new JsonResponse([
            'error'=>'Failed to update model.'
        ],400);
return new JsonResponse
([
    'data'=>$post
]);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post)
    {
       $deleted =$post->forceDelete();
       if(!$deleted){
        return new jsonResource(
            [
                'error'=>'could not delete'
            ],400
        );
       }
       return new JsonResponse([
           'sucess'=>'deleted successful'
       ]);
    }
}
