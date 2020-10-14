<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class VarSize extends Model
{
    protected $fillable = [
        'name'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_size')->withPivot('size_id', 'number');;
    }
}
