<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation', 'description', 'prix', 'auteur',
        'cover', 'type', 'langue', 'editeur', 'categorie',
        'media_type_id',
    ];

    /**
     * Categories (many-to-many)
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    /**
     * Tags (many-to-many)
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'book_tag');
    }

    /**
     * Media Type (many-to-one)
     */
    public function mediaType()
    {
        return $this->belongsTo(MediaType::class, 'media_type_id');
    }
}