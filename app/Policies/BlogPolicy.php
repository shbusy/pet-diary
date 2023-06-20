<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BlogPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    { // 컨트롤러의 index 메서드와 매칭
        // 읽기에 따로 권한이 필요하지 않으므로 true 리턴
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blog $blog): bool
    { // show
        // 읽기에 따로 권한이 필요하지 않으므로 true 리턴
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    { // create, store
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool
    { // edit, update
        // 수정에 권한 필요
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): bool
    { // destroy
        // 삭제에 권한 필요
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blog $blog): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blog $blog): bool
    {
        //
    }
}
