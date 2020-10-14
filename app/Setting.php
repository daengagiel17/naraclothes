<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'popular_id', 'post1_id', 'post2_id', 'post3_id',
        'post4_id', 'post5_id', 'post6_id', 'whatsapp'
    ];
}
