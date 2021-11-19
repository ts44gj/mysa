<?php

namespace App\Policies;

use App\Memo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any memos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the memo.
     *
     * @param  \App\User  $user
     * @param  \App\Memo  $memo
     * @return mixed
     */
    public function view(User $user, Memo $memo)
    {
        return $user->id == $memo->user_id;

    }

    /**
     * Determine whether the user can create memos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the memo.
     *
     * @param  \App\User  $user
     * @param  \App\Memo  $memo
     * @return mixed
     */
    public function update(User $user, Memo $memo)
    {
        //
    }

    /**
     * Determine whether the user can delete the memo.
     *
     * @param  \App\User  $user
     * @param  \App\Memo  $memo
     * @return mixed
     */
    public function delete(User $user, Memo $memo)
    {
        //
    }

    /**
     * Determine whether the user can restore the memo.
     *
     * @param  \App\User  $user
     * @param  \App\Memo  $memo
     * @return mixed
     */
    public function restore(User $user, Memo $memo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the memo.
     *
     * @param  \App\User  $user
     * @param  \App\Memo  $memo
     * @return mixed
     */
    public function forceDelete(User $user, Memo $memo)
    {
        //
    }
}
