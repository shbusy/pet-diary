<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name'
    ];

    protected function user() {
        return $this->belongsTo(User::class);
    }

    // /blogs/{blog} 를 원하는 값으로 변경
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function subscribers() {
        // M:N 관계 설정
        return $this->belongsToMany(User::class)->as('subscription');
    }
}
