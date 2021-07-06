<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'title', 'description', 'image'
    ];

    // relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
