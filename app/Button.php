<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    protected $fillable = [
        'name', 'page'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'stat_button')->withPivot('total');
    }

}
