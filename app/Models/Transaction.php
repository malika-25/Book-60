<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id', 'book_id', 'borrow_date', 'return_date', 'actual_return_date', 'status'])]
class Transaction extends Model
{
    protected function casts(): array
    {
        return [
            'borrow_date' => 'date',
            'return_date' => 'date',
            'actual_return_date' => 'date',
        ];
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
