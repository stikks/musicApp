<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 23/02/2018
 * Time: 10:42 AM
 */

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Traits\FormatsPermissions;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Contracts\Auth\Authenticatable;

class UserInfo extends User
{
    use Notifiable, FormatsPermissions;

    protected $table = 'user_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'reference', 'permissions'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token', 'pivot'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['followers_count', 'display_name'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [ 'id' => 'integer', 'confirmed' => 'integer'];

    public function followedUsers()
    {
        return $this->belongsToMany('App\UserInfo', 'follows', 'follower_id', 'followed_id');
    }

    public function followers()
    {
        return $this->belongsToMany('App\UserInfo', 'follows', 'followed_id', 'follower_id');
    }

    public function getFollowersCountAttribute()
    {
        return $this->followers()->count();
    }

    /**
     * Social profiles this users account is connected to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function social_profiles()
    {
        return $this->hasMany('App\SocialProfile');
    }

    /**
     * Many to many relationship with track model.
     *
     * @return BelongsToMany
     */
    public function tracks()
    {
        return $this->belongsToMany('App\Track')->withTimestamps();
    }

    /**
     * Many to many relationship with user model.
     *
     * @return BelongsToMany
     */
    public function playlists()
    {
        return $this->belongsToMany('App\Playlist')->withPivot('owner');
    }

    /**
     * Get user avatar.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        $value = $this->attributes['avatar'];

        //absolute link
        if ($value && str_contains($value, '//')) return $value;

        //relative link (for new and legacy urls)
        if ($value) {
            return str_contains($value, 'assets') ? url($value) : url("storage/$value");
        }

        //gravatar
        $hash = md5(trim(strtolower($this->email)));

        return "https://www.gravatar.com/avatar/$hash?s=65";
    }

    /**
     * Compile user display name from available attributes.
     *
     * @return string
     */
    public function getDisplayNameAttribute()
    {
        if ($this->first_name && $this->last_name) {
            return $this->first_name.' '.$this->last_name;
        } else if ($this->first_name) {
            return $this->first_name;
        } else if ($this->last_name) {
            return $this->last_name;
        }
//        else {
//            return explode('@', $this->email)[0];
//        }
        return $this->reference;
    }

    /**
     * Check if user has a password set.
     *
     * @return bool
     */
    public function getHasPasswordAttribute()
    {
        return isset($this->attributes['password']) && $this->attributes['password'];
    }

    /**
     * Check if user has a specified permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        $permissions = $this->permissions;

        /*foreach($this->groups as $group) {
            $permissions = array_merge($group->permissions, $permissions);
        }*/

        if (array_key_exists('admin', $permissions) && $permissions['admin']) return true;

        return array_key_exists($permission, $permissions) && $permissions[$permission];
    }

    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode($value);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeCompact(Builder $query)
    {
        return $query->select('user_info.id', 'user_info.avatar', 'user_info.first_name', 'user_info.last_name', 'user_info.reference');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "reference";
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->reference;
    }

    /*
     * artist information
     */
    public function artist() {
        return $this->belongsTo('App\Artist');
    }

    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }

    /**
     * Get the connection of the entity.
     *
     * @return string|null
     */
    public function getQueueableConnection()
    {
        // TODO: Implement getQueueableConnection() method.
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        // TODO: Implement resolveRouteBinding() method.
    }
}