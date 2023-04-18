<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=
        [
            'title',
            'body',
        ];
    protected $casts=[
        'body'=>'array'
    ];
    public function comments()
    {
return $this->hasMany(Comment::class,'post_id');
        # code...
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'post_user_pivot','post_id','user_id');
    }
}
