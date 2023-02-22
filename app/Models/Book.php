<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    protected $fillable = ['author_id', 'publisher_id', 'category_id', 'book_name', 'book_title', 'subject', 'language', 'numberOfPages'];
    public function author()
    {
        return $this->belongsTo(author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(publishers::class);
    }

    public function categorie()
    {
        return $this->belongsTo(categories::class);
    }
}
