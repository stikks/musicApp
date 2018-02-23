<?php namespace App\Policies;

use App\UserInfo as User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionsPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->hasPermission('permissions.view');
    }
}