<?php
// app\models\post\post.php
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
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); // Aquí corregimos 'categories_id' a 'category_id'
    }

    // relacion n-n inversa
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
