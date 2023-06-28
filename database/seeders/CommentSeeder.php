<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 각 글 한개마다
        Post::all()->each(function (Post $post) {
            $factory = Comment::factory()
                ->for($post, 'commentable')
                ->state(function (array $attributes) { // 댓글 작성자를 랜덤으로 지정. 모델팩토리에서 지정할 수 있지만 모델 팩토리에 외래키칼럼에 값을 지정하는건 선호되지 않으므로 시더에 지정
                    return [
                        'user_id' => User::pluck('id')->random()
                    ];
                });

            // has : 댓글을 하나 생성 / count(2), replies : 자식댓글도 두개를 생성
            $factory->has($factory->count(2), 'replies')->create();
            $factory->create();
        });
    }
}
