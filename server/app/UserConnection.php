<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 20/02/2018
 * Time: 2:20 PM
 */

namespace App;

use App\Interfaces\MemcachedInterface;

class UserConnection
{

    private $connection;

    public function __construct(MemcachedInterface $memcached)
    {
        $this->connection = $memcached;
    }

    public function fetchUserByCredentials($token, $data) {

        $data['token'] = $token;
        $unique = md5(time().uniqid());
        if($this->create($unique, $data)) {
            $userData = $this->connection->get($unique);

            if (! is_null($userData)) {
                $this->updateSession($unique);
                $user = UserInfo::where('reference', $data['username'])->exists() ?
                    UserInfo::where('reference', $data['username'])->first() : UserInfo::create([
                        'reference' => $data['username'],
                        'permissions' => $data['permissions'],
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name']
                    ]);
                return $user;
            }
        }

        return null;
    }

    public function create($sessionId, Array $user) {
        return $this->connection->create($sessionId, $user);
    }

    public function find($sessionId) {
        return $this->connection->get($sessionId);
    }

    public function delete($sessionId) {
        return $this->connection->delete($sessionId);
    }

    public function getToken($sessionId) {
        $obj = $this->connection->get($sessionId);
        return !is_null($obj) ? $obj['token'] : null;
    }

    public function updateSession($sessionId) {
        if (isset($_COOKIE['___media_xcred___'])) {
            $data = $_COOKIE['___media_xcred___'];
            $this->delete($data);
            setcookie("___media_xcred___", "", time() - 3600, '/');
        }
        setcookie('___media_xcred___', $sessionId, 2147483647, '/', config('api.cookie_domain'));
    }
}