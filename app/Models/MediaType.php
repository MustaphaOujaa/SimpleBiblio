<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MediaType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon', 'description'];

    /**
     * Auto-generate slug before saving.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($type) {
            if (empty($type->slug)) {
                $type->slug = Str::slug($type->name);
            }
        });
    }

    /**
     * Books of this media type (one-to-many).
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'media_type_id');
    }
}
