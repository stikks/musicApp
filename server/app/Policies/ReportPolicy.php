<?php namespace App\Policies;

use App\Account as User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReportPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->hasPermission('reports.view');
    }
}