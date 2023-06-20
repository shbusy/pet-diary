<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot() {
        // 최고관리자 설정
        /*Gate::before(function ($user, $ability) {
            if($user->isAdministrator()) {
                return true;
            };
        });*/

        // 블로그 소유자만 블로그를 확인할수있게 권한 검사하는 게이트
        Gate::define('update-blog', function (User $user, Blog $blog) {
            return $user->id === $blog->user_id;
        });
    }
}
