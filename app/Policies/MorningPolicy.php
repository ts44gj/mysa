<?php

namespace App\Policies;

use App\Morning;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MorningPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any mornings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the morning.
     *
     * @param  \App\User  $user
     * @param  \App\Morning  $morning
     * @return mixed
     */
    public function view(User $user, Morning $morning)
    {
        return $user->id == $morning->user_id;

    }

    /**
     * Determine whether the user can create mornings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the morning.
     *
     * @param  \App\User  $user
     * @param  \App\Morning  $morning
     * @return mixed
     */
    public function update(User $user, Morning $morning)
    {
        //
    }

    /**
     * Determine whether the user can delete the morning.
     *
     * @param  \App\User  $user
     * @param  \App\Morning  $morning
     * @return mixed
     */
    public function delete(User $user, Morning $morning)
    {
        //
    }

    /**
     * Determine whether the user can restore the morning.
     *
     * @param  \App\User  $user
     * @param  \App\Morning  $morning
     * @return mixed
     */
    public function restore(User $user, Morning $morning)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the morning.
     *
     * @param  \App\User  $user
     * @param  \App\Morning  $morning
     * @return mixed
     */
    public function forceDelete(User $user, Morning $morning)
    {
        //
    }
}
