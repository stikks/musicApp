<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\UserProvider;
use App\CustomUser;
use App\ApiRequest;
use Illuminate\Contracts\Auth\Authenticatable;

class CustomProvider implements UserProvider
{
    private $apiRequest;
    private $model;

    public function __construct(CustomUser $model, ApiRequest $apiRequest)
    {
        $this->apiRequest = $apiRequest;
        $this->model = $model;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        // TODO: Implement retrieveById() method.
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    public function retrieveUser($token) {

        $resp = $this->apiRequest->getUser($token);

        if (is_null($resp)) {
            return null;
        }
        $user = (array)$resp['body'];
        return $this->model->fetchUserByCredentials($user['username'], $token, $user);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        try{
            $resp = $this->apiRequest->postData('auth/login', $credentials);

            if (!$resp['status']) {
                return null;
            };

            return $this->retrieveUser($resp['body']->access_token);
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // TODO: Implement validateCredentials() method.
        return $user->getAuthIdentifier() == $credentials['username'];
    }

    public function getUser($username) {

        if ($resp=$this->model->find($username)) {
            return (object)$resp;
        };
        return null;
    }
}
