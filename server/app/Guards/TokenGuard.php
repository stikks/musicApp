<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:53 PM
 */

namespace App\Guards;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Auth\SupportsBasicAuth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Support\Traits\Macroable;
use Illuminate\Auth\Events;
use Illuminate\Auth\AuthenticationException;

class TokenGuard implements StatefulGuard, SupportsBasicAuth
{
    use GuardHelpers, Macroable;

    protected $provider;
    protected $request;
    protected $user=null;
    protected $lastAttempted;

    public function __construct(UserProvider $provider, Request $request)
    {
        $this->provider = $provider;
        $this->request = $request;
        $this->user;
    }

    /**
     * Fire the authenticated event if the dispatcher is set.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function fireAuthenticatedEvent($user)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Events\Authenticated($user));
        }
    }

    /**
     * Fire the failed authentication attempt event with the given arguments.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     * @param  array  $credentials
     * @return void
     */
    protected function fireFailedEvent($user, array $credentials)
    {
        if (isset($this->events)) {
            $this->events->dispatch(new Events\Failed($user, $credentials));
        }
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        dd(Auth::id());
        if ($username=$this->getSessionParams()) {
            $this->user = $this->provider->getUser($username);
        }
        return $this->user;
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
//    public function setUser(Authenticatable $user)
//    {
//        $this->user = $user;
//        setcookie('___media_xcred___', $user->getAuthIdentifier(), 2147483647, '/', config('api.cookie_domain'));
//    }

    /**
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return $this
     */
    public function setUser(Authenticatable $user)
    {
        $this->user = $user;

        $this->fireAuthenticatedEvent($user);

        setcookie('___media_xcred___', $user->getAuthIdentifier(), 2147483647, '/', config('api.cookie_domain'));

        return $this;
    }

    /**
     * Return the currently cached user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUser()
    {
        return $this->user();
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
//            $data = $this->request->session()->get('___media_xcred___');
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
        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);

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

    /**
     * Determine if the current user is authenticated.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function authenticate()
    {
        if (! is_null($user = $this->user())) {
            return $user;
        }

        throw new AuthenticationException;
    }

    /**
     * Get the user provider used by the guard.
     *
     * @return \Illuminate\Contracts\Auth\UserProvider
     */
    public function getProvider()
    {
        return $this->provider;
    }

}
