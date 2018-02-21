<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can store the post.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function storePost(User $auth, User $user)
    {
        return $auth->id === $user->id;
    }

        /**
     * Determine whether the user can view the profile.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewProfile(User $auth, User $user)
    {
        return ($auth->isFriendOf($user->id) or $auth->id === $user->id);
    }
    
    /**
     * Determine whether the user can edit the profile.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function editProfile(User $auth, User $user)
    {
        return $auth->id === $user->id;
    }

    /**
     * Determine whether the user can manage friends.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manageFriendship(User $auth, User $user)
    {
        return $auth->id === $user->id;
    }
}
