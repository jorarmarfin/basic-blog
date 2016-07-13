<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $post)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
    public function update($user, $post)
    {
        return $user->isAuthor($post);
    }
}
