<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    // relation with article, 1 category many articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
