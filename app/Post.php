<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [];


    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function getCategoryListAttribute()
    {
        return $this->categories;
    }
}
