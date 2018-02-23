<?php namespace App\Http\Controllers\Auth;

use App\Mail\ConfirmEmail;
use App\User;
use App\Services\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\UserInfoRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\ApiRequest;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Settings service instance.
     *
     * @var Settings
     */
    private $settings;

    /**
     * UserRepository service instance.
     *
     * @var UserInfoRepository
     */
    private $repository;

    /**
     * ApiRepository service instance.
     *
     * @var UserInfoRepository
     */
    private $apiRequest;

    /**
     * RegisterController constructor.
     *
     * @param Settings $settings
     * @param UserInfoRepository $repository
     * @param ApiRequest $apiRequest
     */
    public function __construct(Settings $settings, UserInfoRepository $repository, ApiRequest $apiRequest)
    {
        $this->settings = $settings;
        $this->repository = $repository;
        $this->apiRequest = $apiRequest;

        $this->middleware('guest');

        //abort if registration should be disabled
        if ($this->settings->get('disable.registration')) abort(404);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255|confirmed',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

//        $needsConfirmation = $this->settings->get('require_email_confirmation');
//
//        if ($needsConfirmation) {
//            $code = str_random(30);
//            $params['confirmation_code'] = $code;
//            $params['confirmed'] = 0;
//        }
//
//        event(new Registered($user = $this->create($params)));
//
//        if ($needsConfirmation) {
//            Mail::queue(new ConfirmEmail($params['email'], $code));
//            return $this->success(['type' => 'confirmation_required']);
//        }

        $name = explode(' ', $data['name']);
        $data['first_name'] = $name[0];
        if (count($name) > 1) {
            unset($name[0]);
            $data['last_name'] = join(' ', $name);
        }

        $response = $this->apiRequest->postData("auth/register", $data);

        if ($response['status'] == true) {
            $data['reference'] = $data['username'];
            $data['permissions'] = [
                'artists.view' => 1,
                'albums.view' => 1,
                'tracks.view' => 1,
                'genres.view' => 1,
                'lyrics.view' => 1,
                'users.view'  => 1,
                'playlists.create' => 1,
                'localizations.show' => 1,
                'pages.view' => 1,
                'uploads.create' => 1,
            ];
            $this->create($data);
            return $this->success();
//            return $this->registered($request, \Auth::user()->info);
        }

        return $this->error(['general'=>$response['body']]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * The user has been registered.
     *
     * @param Request $request
     * @param $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function registered(Request $request, User $user)
    {
        return $this->success(['data' => $user->load('groups')->toArray()]);
    }
}