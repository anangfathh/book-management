<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id');
    }
    public function publisher()
    {
        return $this->belongsTo(BookPublisher::class, 'publisher_id');
    }
}
