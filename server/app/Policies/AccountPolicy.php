<?php

namespace App\Policies;

use App\UserInfo as User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class AccountPolicy
{
    use HandlesAuthorization;

    private $request;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(User $user)
    {
        return $user->hasPermission('users.view');
    }

    public function show(User $current, User $requested)
    {
        return $current->hasPermission('users.view') || $current->info->id === $requested->info->id;
    }

    public function store(User $user)
    {
        return $user->hasPermission('users.create');
    }

    public function update(User $current, User $toUpdate = null)
    {
        //user has proper permissions
        if ($current->hasPermission('users.update')) return true;

        //no permissions and not trying to update his own model
        if ( ! $toUpdate || ($current->info->id !== $toUpdate->info->id)) return false;

        //user should not be able to change his own permissions or groups
        if ($this->request->get('permissions') || $this->request->get('groups')) {
            return false;
        }

        return true;
    }

    public function destroy(User $user)
    {
        return $user->hasPermission('users.delete');
    }
}
