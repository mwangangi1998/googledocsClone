<?php

namespace App\Http\Controllers;

use App\Http\Resources\commentsResource;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return commentsResource
     */
    public function index()
    {
$data=Comment::query()->get();
return commentsResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCommentRequest $request)
    {
        //
        $created=Comment::query()->create(
            [
                'body'
            ]
            );
            if(!$created){
                return new JsonResponse ([
                    'error'=> 'failed to create comment'
                ]);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return commentsResource
     */
    public function show(Comment $comment)
    {
        return new commentsResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $deteled=$comment->forceDelete();
        if(!$deteled){
            return new JsonResponse([
                'error'=>'comment could not be deletd '
            ]);

        }
        return new JsonResponse([
            'success'=>'deletion was successful'
        ]);
    }
}
