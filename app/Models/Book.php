<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation', 'designation_ar', 'designation_fr',
        'description', 'description_ar', 'description_fr',
        'prix', 'auteur', 'cover', 'type', 'langue', 
        'editeur', 'categorie', 'media_type_id', 'annee'
    ];

    /**
     * Get translated designation
     */
    public function getDesignationAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && $this->designation_ar) {
            return $this->designation_ar;
        }
        if ($locale === 'fr' && $this->designation_fr) {
            return $this->designation_fr;
        }
        return $value;
    }

    /**
     * Get translated description
     */
    public function getDescriptionAttribute($value)
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && $this->description_ar) {
            return $this->description_ar;
        }
        if ($locale === 'fr' && $this->description_fr) {
            return $this->description_fr;
        }
        return $value;
    }

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