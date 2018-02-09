<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:50 PM
 */

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use App\Interfaces\MemcachedInterface;

class CustomUser implements Authenticatable
{
    private $connection;
    private $username;
    protected $token;
    private $rememberTokenName = 'remember_token';

    public function __construct(MemcachedInterface $memcached)
    {
        $this->connection = $memcached;
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
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->username;
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

    public function fetchUserByCredentials($username, $token, $data) {

        $data['token'] = $token;
        if($this->create($username, $data)) {
            $user = $this->connection->get($username);

            if (! is_null($user)) {
                $this->username = $user['username'];
                $this->token = $token;
            }
        }

        return $this;
    }

    public function create($username, Array $user) {
        return $this->connection->create($username, $user);
    }

    public function find($username) {
        return $this->connection->get($username);
    }

}