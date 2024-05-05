<?php

namespace App\Models\backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
///
use App\Models\post\post;

class tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    // relacion n-n inversa
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
