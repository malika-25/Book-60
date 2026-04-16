<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['title', 'author', 'publisher', 'isbn', 'published_year', 'stock', 'description', 'cover_image', 'category_id'])]
class Book extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
