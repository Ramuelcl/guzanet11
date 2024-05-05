<?php

namespace App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\backend\Category;
use App\Models\backend\Tag;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image_path', 'is_published', 'category_id'];

    // relacion 1-n inversa
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // relacion n-n inversa
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
