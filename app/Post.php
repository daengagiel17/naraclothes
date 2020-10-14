<?php

namespace App;
use App\Gambar;
use App\VarSize;
use App\Size;
use App\Button;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UserActivities;

    protected $fillable = ['title', 'description', 'excellence', 'price', 'price_old', 'image'];


    public function gambar()
    {
        return $this->hasMany(Gambar::class);
    }

    public function varSize()
    {
        return $this->belongsToMany(VarSize::class, 'post_size')->withPivot('size_id', 'number');
    }

    public function size()
    {
        return $this->belongsToMany(Size::class, 'post_size')->withPivot('var_size_id', 'number');
    }

    public function button()
    {
        return $this->belongsToMany(Button::class, 'stat_button')->withPivot('total');
    }

}
