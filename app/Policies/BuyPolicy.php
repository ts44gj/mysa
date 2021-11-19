<?php

namespace App\Policies;

use App\Buy;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any buys.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the buy.
     *
     * @param  \App\User  $user
     * @param  \App\Buy  $buy
     * @return mixed
     */
    public function view(User $user, Buy $buy)
    {
        return $user->id == $buy->user_id;

    }

    /**
     * Determine whether the user can create buys.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the buy.
     *
     * @param  \App\User  $user
     * @param  \App\Buy  $buy
     * @return mixed
     */
    public function update(User $user, Buy $buy)
    {
        //
    }

    /**
     * Determine whether the user can delete the buy.
     *
     * @param  \App\User  $user
     * @param  \App\Buy  $buy
     * @return mixed
     */
    public function delete(User $user, Buy $buy)
    {
        //
    }

    /**
     * Determine whether the user can restore the buy.
     *
     * @param  \App\User  $user
     * @param  \App\Buy  $buy
     * @return mixed
     */
    public function restore(User $user, Buy $buy)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the buy.
     *
     * @param  \App\User  $user
     * @param  \App\Buy  $buy
     * @return mixed
     */
    public function forceDelete(User $user, Buy $buy)
    {
        //
    }
}
