<?php

namespace App\Policies;
use App\User;
use App\Shuju;
use Illuminate\Auth\Access\HandlesAuthorization;

class WenPolicy
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


    public function destroy(User $user, Shuju $shuju)
    {
        return $user->id === $shuju->user_id;
    }
}
