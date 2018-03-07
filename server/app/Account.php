<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 31/01/2018
 * Time: 9:25 AM
 */

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use DB;
use App\Playlist;
use Illuminate\Database\Eloquent\Collection;

class Account implements Authenticatable
{
    private $rememberTokenName = 'remember_token';
    public $username;
    public $info;

    public function __construct(Array $data)
    {
        $this->info = (object)$data;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "username";
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->info->username;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->info->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return $this->rememberTokenName;
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
        $info = $this->info;
        return DB::table('tracks')->select('tracks.*')->join('track_user','track_user.track_id','=','tracks.id')->where(['user_id' => $info->id])->get();
//        return $this->belongsToMany('App\Track')->withTimestamps();
    }

    /**
     * Many to many relationship with user model.
     *
     * @return
     */
    public function playlists()
    {
        $info = $this->info;
        return DB::table('playlists')->select('playlists.*')->join('playlist_user', 'playlist_user.playlist_id', '=', 'playlists.id')->where('playlist_user.user_id', $info->id)->get();
//        return $this->belongsToMany('App\Playlist')->withPivot('owner');
    }

    /*
     * get user playlists
     * @return array
     */
    public function getUserPlaylists() {
        $info = $this->info;
        return DB::table('playlists')->select('playlists.*')->join('playlist_user','playlist_user.playlist_id','=','playlists.id')->where(['user_id' => $info->id, 'owner' => 1])->get();
    }
}