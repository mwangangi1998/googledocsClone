<?php

namespace App\Respositories;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class postRespository
{
    public function create(array $attribute)
    {
        $created = DB::transaction(function () use ($attribute) {
            $created = Post::query()->create(
                [
                    'title' => data_get($attribute, 'title', 'utitled'),
                    'body' => data_get($attribute, 'body'),
                ]
            );
            if ($userIds = data_get($attribute, 'user_ids')) {
                $created->users()->sync('user_ids');
            }
            return $created;

        });

    }
    public function update()
    {

    }
    public function forcedelete()
    {

    }
}
