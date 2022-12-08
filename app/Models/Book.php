<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    public $timestamps = false;

    protected $fillable = [
        'title'
    ];

    public $allRelations = [
        'article'
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(BookArticle::class);
    }
}
