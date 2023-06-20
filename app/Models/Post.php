<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function blog() {
        // 블로는 다수의 포스트를 가진다
        return $this->belongsTo(Blog::class);
    }
}
