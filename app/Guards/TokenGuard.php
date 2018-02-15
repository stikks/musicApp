<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:53 PM
 */

namespace App\Guards;
use App\DataSources\MemCached;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Illuminate\Contracts\Auth\Authenticatable;

use App\DataSources\MemCached as MemCachedSource;

class TokenGuard implements StatefulGuard, SupportsBasicAuth
{
    private $provider;
    private $request;
    private $user=null;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->provider = $provider;
        $this->request = $request;
        $this->user;
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        return ! is_null($this->user());
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        return ! $this->check();
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        if ($username=$this->getSessionParams()) {
            return $this->provider->getUser($username);
        }
        return $this->user;
    }

    /**
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {
        if ($this->check()) {
            return $this->user()->getAuthIdentifier();
        }
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        if (empty($credentials['username']) || empty($credentials['password'])) {
            return false;
        }

        $user = $this->provider->retrieveByCredentials($credentials);

        if (!is_null($user)) {
            $this->setUser($user);
            return true;
        }

        return false;
    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return void
     */
//    public function setUser(Authenticatable $user)
//    {
//        $this->user = $user;
//        $this->request->session()->put('___media_xcred___', $user->getAuthIdentifier());
//    }
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;
        setcookie('___media_xcred___', $user->getAuthIdentifier(), 2147483647, '/', config('api.cookie_domain'));
    }


    public function getToken() {
        $user = Auth::user();
        return $user->token;
    }

//    public function getSessionParams()
//    {
//        $data = NULL;
//        if (isset($_COOKIE['___media_xcred___']))
//            $data = $_COOKIE['___media_xcred___'];
//        return (!empty($data) ? $data : NULL);
//    }
//
//    public function logout() {
//        setcookie("___media_xcred___", "", time() - 3600);
//        session()->forget('___media_xcred___');
//        return redirect('/login');
//    }

    public function getSessionParams()
    {
        $data = NULL;
        if (isset($_COOKIE['___media_xcred___']))
            $data = $_COOKIE['___media_xcred___'];
        return (!empty($data) ? $data : NULL);
    }

    public function logout() {
        if (isset($_COOKIE['___media_xcred___'])) {
            $data = $_COOKIE['___media_xcred___'];
            $this->provider->deleteSession($data);
            setcookie("___media_xcred___", "", time() - 3600, '/');
        }
        return redirect('/login');
    }


    protected function hasValidCredentials($user, $credentials)
    {
        return ! is_null($user) && $this->provider->validateCredentials($user, $credentials);
    }

    /**
     * Log a user into the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  bool  $remember
     * @return void
     */
    public function login(Authenticatable $user, $remember = false)
    {
        $this->setUser($user);
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool $remember
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false)
    {
        $credentials['username'] = $credentials['email'];
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);

        // If an implementation of UserInterface was returned, we'll ask the provider
        // to validate the user against the given credentials, and if they are in
        // fact valid we'll log the users into the application and return true.
        if ($this->hasValidCredentials($user, $credentials)) {
            $this->login($user, $remember);

            return true;
        }

        return false;
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param  array $credentials
     * @return bool
     */
    public function once(array $credentials = [])
    {
        // TODO: Implement once() method.
    }

    /**
     * Log the given user ID into the application.
     *
     * @param  mixed $id
     * @param  bool $remember
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function loginUsingId($id, $remember = false)
    {
        // TODO: Implement loginUsingId() method.
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param  mixed $id
     * @return bool
     */
    public function onceUsingId($id)
    {
        // TODO: Implement onceUsingId() method.
    }

    /**
     * Determine if the user was authenticated via "remember me" cookie.
     *
     * @return bool
     */
    public function viaRemember()
    {
        // TODO: Implement viaRemember() method.
    }

    /**
     * Attempt to authenticate using HTTP Basic Auth.
     *
     * @param  string $field
     * @param  array $extraConditions
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function basic($field = 'username', $extraConditions = [])
    {
        // TODO: Implement basic() method.
    }

    /**
     * Perform a stateless HTTP Basic login attempt.
     *
     * @param  string $field
     * @param  array $extraConditions
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function onceBasic($field = 'username', $extraConditions = [])
    {
        // TODO: Implement onceBasic() method.
    }
}