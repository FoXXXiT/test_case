<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanedBook extends Model
{
    use HasFactory;

    protected $table = 'loaned_books';

    public $timestamps = false;

    protected $fillable = [
        'book_article_id',
        'user_id',
        'borrow_start',
        'borrow_end',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(BookArticle::class,'book_article_id','id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function getBorrowStartAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getBorrowEndAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
