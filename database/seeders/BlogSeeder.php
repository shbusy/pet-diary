<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*User::all() -> each(function (User $user) {
            Blog::factory()->for($user)->create();
        });*/

        // 블로그 소유자를 제외한 3명을 랜덤으로 얻어와 구독자로 설정한다
        User::all()->each(function (User $user) {
            $subscribers = User::whereNot('id', $user->id)->get()->random(3);

            Blog::factory()->for($user)->hasAttached(
                factory: $subscribers,
                relationship: 'subscribers'
            )->create();
        });
    }
}
