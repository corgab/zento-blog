<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSection extends Model
{
    use HasFactory;

    protected $fillable = ['post_id','title', 'content', 'order'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'section_id');
    }
}
