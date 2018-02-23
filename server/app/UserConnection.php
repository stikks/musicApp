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

    public function fetchUserByCredentials($username, $token, $data) {

        $storedData = array('token'=>$token, 'username'=>$data['username'], 'email'=>$data['email'], 'id'=>$data['id']);
        if($this->create($username, $storedData)) {
            $userData = $this->connection->get($username);

            if (! is_null($userData)) {
                $user = UserInfo::where('reference', $storedData['username'])->first();
//                $user = new Account($userData);
                return $user;
            }
        }

        return null;
    }

    public function create($username, Array $user) {
        return $this->connection->create($username, $user);
    }

    public function find($username) {
        return $this->connection->get($username);
    }

    public function delete($username) {
        return $this->connection->delete($username);
    }
}