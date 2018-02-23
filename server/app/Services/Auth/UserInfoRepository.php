<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 23/02/2018
 * Time: 11:22 AM
 */

namespace App\Services\Auth;

use App\User;
use App\UserInfo;
use App\Services\Settings;

class UserInfoRepository
{

    /**
     * User model instance.
     *
     * @var UserInfo
     */
    private $user;

    /**
     * @var Settings
     */
    private $settings;

    /**
     * UserRepository constructor.
     *
     * @param UserInfo $user
     * @param Settings $settings
     */
    public function __construct(
        UserInfo $user,
        Settings $settings
    )
    {
        $this->user  = $user;
        $this->settings = $settings;
    }

    /**
     * Find user with given id or throw an error.
     *
     * @param integer $id
     * @param array $lazyLoad
     * @return UserInfo
     */
    public function findOrFail($id, $lazyLoad = [])
    {
        return $this->user->with($lazyLoad)->findOrFail($id);
    }

    /**
     * Paginate all users using given params.
     *
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateUsers($params)
    {
        $orderBy    = isset($params['order_by']) ? $params['order_by'] : 'created_at';
        $orderDir   = isset($params['order_dir']) ? $params['order_dir'] : 'desc';
        $perPage    = isset($params['per_page']) ? $params['per_page'] : 13;
        $searchTerm = isset($params['query']) ? $params['query'] : null;
//        $groupId    = isset($params['group_id']) ? (int) $params['group_id'] : null;
//        $groupName  = isset($params['group_name']) ? $params['group_name'] : null;

        $query = $this->user->with('groups');

        if ($searchTerm) {
            $query->where('reference', 'LIKE', "%$searchTerm%");
        }

//        if ($groupId) {
//            $query->whereHas('groups', function($q) use($groupId) {
//                $q->where('groups.id', $groupId);
//            });
//        }
//
//        if ($groupName) {
//            $query->whereHas('groups', function($q) use($groupName) {
//                $q->where('groups.name', $groupName);
//            });
//        }

        return $query->orderBy($orderBy, $orderDir)->paginate($perPage);
    }

    /**
     * Return first user matching attributes or create a new one.
     *
     * @param array $params
     * @return User
     */
    public function firstOrCreate($params)
    {
        $user = $this->user->where('reference', $params['reference'])->first();

        if (is_null($user)) {
            $user = $this->create($params);
        }

        return $user;
    }

    /**
     * Create a new user and assign default customer group to it.
     *
     * @throws \Exception
     *
     * @param array $params
     * @return User
     */
    public function create($params)
    {
        /** @var UserInfo $user */
        $user = UserInfo::forceCreate($this->formatParams($params));

//        try {
//            if ( ! isset($params['groups']) || ! $this->attachGroups($user, $params['groups'])) {
//                $this->assignDefaultGroup($user);
//            }
//        } catch (\Exception $e) {
//            //delete user if there were any errors creating/assigning
//            //purchase codes or groups, so there are no artifacts left
//            $user->delete();
//            throw($e);
//        }

        return $user;
    }

    /**
     * Update given user.
     *
     * @param User $user
     * @param array $params
     *
     * @return User
     */
    public function update(UserInfo $user, $params)
    {
        $user->forceFill($this->formatParams($params, 'update'))->save();

//        if (isset($params['groups'])) {
//            $this->attachGroups($user, $params['groups']);
//        }
        return $user;

//        return $user->load('groups');
    }

    /**
     * Delete multiple users.
     *
     * @param array $ids
     * @return bool|null
     */
    public function deleteMultiple($ids)
    {
        return $this->user->whereIn('id', $ids)->delete();
    }

    /**
     * Prepare given params for inserting into database.
     *
     * @param array $params
     * @param string $type
     * @return array
     */
    private function formatParams($params, $type = 'create')
    {
        $formatted = [
            'avatar'      => isset($params['avatar']) ? $params['avatar'] : null,
            'first_name'  => isset($params['first_name']) ? $params['first_name'] : null,
            'last_name'   => isset($params['last_name']) ? $params['last_name'] : null,
            'language'    => isset($params['language']) ? $params['language'] : $this->settings->get('i18n.default_localization'),
            'country'     => isset($params['country']) ? $params['country'] : null,
            'timezone'    => isset($params['timezone']) ? $params['timezone'] : null,
//            'confirmed'   => isset($params['confirmed']) ? $params['confirmed'] : 1,
//            'confirmation_code' => isset($params['confirmation_code']) ? $params['confirmation_code'] : null,
        ];

        //cast permission values to integer
        if (isset($params['permissions'])) {
            $formatted['permissions'] = array_map(function($value) {
                return (int) $value;
            }, $params['permissions']);
        }

        if ($type === 'create') {
            $formatted['reference']    = $params['reference'];
//            $formatted['password'] = isset($params['password']) ? bcrypt($params['password']) : null;
        }

        return $formatted;
    }

//    /**
//     * Assign groups to user, if any are given.
//     *
//     * @param User  $user
//     * @param array $groups
//     * @type string $type
//     *
//     * @return int
//     */
//    public function attachGroups(User $user, $groups, $type = 'sync')
//    {
//        $groupIds = $this->group->whereIn('id', $groups)->get()->pluck('id');
//        return $user->groups()->$type($groupIds);
//    }

//    /**
//     * Detach specified groups from user.
//     *
//     * @param User $user
//     * @param int[] $groups
//     *
//     * @return int
//     */
//    public function detachGroups(User $user, $groups)
//    {
//        return $user->groups()->detach($groups);
//    }

    /**
     * Add specified permissions to user.
     *
     * @param UserInfo $user
     * @param array $permissions
     * @return User
     */
    public function addPermissions(UserInfo $user, $permissions)
    {
        $existing = $user->permissions;

        foreach ($permissions as $permission) {
            $existing[$permission] = 1;
        }

        $user->forceFill(['permissions' => $existing])->save();

        return $user;
    }

    /**
     * Remove specified permissions from user.
     *
     * @param UserInfo $user
     * @param array $permissions
     * @return User
     */
    public function removePermissions(UserInfo $user, $permissions)
    {
        $existing = $user->permissions;

        foreach ($permissions as $permission) {
            unset($existing[$permission]);
        }

        $user->forceFill(['permissions' => $existing])->save();

        return $user;
    }

//    /**
//     * Assign default group to given user.
//     *
//     * @param User $user
//     */
//    private function assignDefaultGroup(User $user)
//    {
//        $defaultGroup = $this->group->getDefaultGroup();
//
//        if ($defaultGroup) {
//            $user->groups()->attach($defaultGroup->id);
//        }
//    }
}