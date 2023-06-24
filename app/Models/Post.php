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
        'img_link',
    ];

    // 블로그는 다수의 포스트를 가진다
    public function blog() {
        return $this->belongsTo(Blog::class);
    }

    // 랜덤한 글 3개를 메인에 노출
    public static function getRandomPosts() {
        return self::whereHas('blog')->inRandomOrder()->limit(3)->get();
    }
}
