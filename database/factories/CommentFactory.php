<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model=Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $count=Post::query()->count();
        if($count===0){
            $postId=Post::factory()->create()->id;
        }
else{
    $postId=rand(1,$count);
}
        return [
            'body'=>[],
            'user_id'=>1,
            'post_id'=>$postId,
            //
        ];
    }
}
