<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    // 삭제시 삭제상태로 놔두기 위해 SoftDeletes 추가
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'content'
    ];

    // 댓글은 유저에 속한다(belongsTo())
    public function user() {
        return $this->belongsTo(User::class);
    }

    // 댓글은 포스트에도, 방명록(예시)에도 속할 수 있으므로 다형성 관계(morphTo())로 지정한다
    public function commentable() {
        return $this->morphTo();
    }

    // 자식댓글이 parent_id로 속해있는(belongsTo()) 부모댓글을 찾는다
    public function parent() {
        return $this->belongsTo(Comment::class, 'parent_id');
        // 자식댓글의 경우 삭제된 댓글은 조회하지 않음
    }

    // 부모댓글이 parent_id로 가지고있는(hasMany()) 자식댓글을 찾는다
    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id')
            ->withTrashed(); // 삭제된 댓글도 조회할것으므로 SoftDeletes::withTrashed()를 명시
    }
}
