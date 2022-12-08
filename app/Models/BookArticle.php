<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookArticle extends Model
{
    use HasFactory;

    protected $table = 'book_articles';

    public $timestamps = false;

    protected $fillable = [
        'book_id',
        'article',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
