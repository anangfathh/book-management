<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookProposal extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'category_id');
    }
    public function publisher()
    {
        return $this->belongsTo(BookPublisher::class, 'publisher_id');
    }
}
