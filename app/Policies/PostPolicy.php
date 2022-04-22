<?php

namespace App\Policies;

use App\Models\User;
use App\Models\posts;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_posts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('add_posts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user,$id)
    {
        // return $user->checkPermissionAccess('update_posts');
        $post = posts::find($id);
        if($user->checkPermissionAccess('update_posts') && $user->id === $post->user_id)
        {
            return true;
        }
        return false;
    }
    public function trash(User $user)
    {
        return $user->checkPermissionAccess('trash_posts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_posts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\posts  $posts
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, posts $posts)
    {
        //
    }
}
