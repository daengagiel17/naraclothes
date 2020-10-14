<?php

namespace App;
use App\Size;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_size')->withPivot('var_size_id', 'number');;
    }
}
