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

    public function fetchUserByCredentials($sessionId, $token, $data) {

        $storedData = array('token'=>$token, 'username'=>$data['username'], 'email'=>$data['email'], 'id'=>$data['id']);
        $unique = md5(time().uniqid());
        if($this->create($unique, $storedData)) {
            $userData = $this->connection->get($sessionId);

            if (! is_null($userData)) {
                setcookie('___media_xcred___', $unique, 2147483647, '/', config('api.cookie_domain'));
                $user = UserInfo::where('reference', $storedData['username'])->first();
//                $user = new Account($userData);
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

}