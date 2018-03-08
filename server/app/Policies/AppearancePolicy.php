<?php namespace App\Policies;

use App\UserInfo as User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppearancePolicy
{
    use HandlesAuthorization;

    public function update(User $user)
    {
        return $user->hasPermission('appearance.update');
    }
}
