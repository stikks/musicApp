<?php namespace App\Http\Controllers;

use App\Account;
use App\ApiRequest;
use App\Http\Requests\ModifyUsers;
use App\Playlist;
use App\Services\Auth\UserRepository;
use Auth;
use ClassesWithParents\D;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Services\DBConnector;
use DB;

class UsersController extends Controller {

    /**
     * @var UserInfo
     */
    private $model;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Apirequest
     */
    private $apiRequest;

    /**
     * UsersController constructor.
     *
     * @param UserInfo $user
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(UserInfo $user, UserRepository $userRepository, Request $request, ApiRequest $apiRequest)
    {
        $this->model = $user;
        $this->request = $request;
        $this->userRepository = $userRepository;
        $this->apiRequest = $apiRequest;

        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Return a collection of all registered users.
     *
     * @return LengthAwarePaginator
     */
    public function index()
    {
        $this->authorize('index', UserInfo::class);

        return $this->userRepository->paginateUsers($this->request->all());
    }

    /**
     * Return user matching given id.
     *
     * @param integer $id
     */
    public function show($id)
    {
//        $currUser = $this->request->user();
//
//        $response = $this->apiRequest->basicGet("users/$currUser->id");
//
//        $user = $response['body'];

        $user = $this->request->user();

        $user = $this->model->with(['social_profiles', 'followedUsers', 'followers', 'playlists' => function($q) {
            $q->with(['tracks.album' => function($query) {
                return $query->limit(1);
            }])->where('public', 1)->whereHas('tracks');
        }])->findOrFail($id);

//        $user->social_profiles = DBConnector::where('social_profiles', ['user_id'=>$user->id], false);
//        $user->followers = DBConnector::where('follows', ['followed_id'=>$user->id], false);
//        $user->followedUsers = DBConnector::where('follows', ['follower_id'=>$user->id], false);
//        $user->playlists = $this->setPlaylistImage($this->request->user()->playlists());

        $this->authorize('show', $user);

        return $user;
    }

    /**
     * Create a new user.
     *
     * @param ModifyUsers $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ModifyUsers $request)
    {
        $this->authorize('store', UserInfo::class);

        $user = $this->userRepository->create($this->request->all());

        return $this->success(['data' => $user], 201);
    }

    /**
     * Update an existing user.
     *
     * @param integer $id
     * @param ModifyUsers $request
     *
     * @return UserInfo
     */
    public function update($id, ModifyUsers $request)
    {
        $user = $this->userRepository->findOrFail($id);

        $this->authorize('update', $user);

        $user = $this->userRepository->update($user, $this->request->all());

        return $user;
    }

    /**
     * Delete multiple users.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMultiple()
    {
        $this->authorize('destroy', UserInfo::class);

        $this->validate($this->request, [
            'ids' => 'required|array|min:1'
        ]);

        $this->userRepository->deleteMultiple($this->request->get('ids'));

        return $this->success([], 204);
    }

    /**
     * Follow user with given id.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function follow($id)
    {
        $user = $this->model->findOrFail($id);

        if ($user->id !== Auth::user()->id) {
            Auth::user()->followedUsers()->sync([$id], false);
        }

        return $this->success();
    }

    /**
     * UnFollow user with given id.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function unfollow($id)
    {
        $user = $this->model->findOrFail($id);

        if ($user->id != Auth::user()->id) {
            Auth::user()->followedUsers()->detach($id);
        }

        return $this->success();
    }

    /**
     * Make sure all playlists have an image.
     *
     * @param Collection $playlists
     * @return Collection
     */
    private function setPlaylistImage($playlists)
    {
        return $playlists->map(function($playlist) {
            if ( ! $playlist->getAttribute('image') && isset($playlist->tracks->first()->album->image)) {
                $playlist->image = $playlist->tracks->first()->album->image;
            }

            if ( ! $playlist->image) {
                $playlist->image = url('assets/images/default/artist_small.jpg');
            }

            unset($playlist->tracks);
            $playlist->image = url('assets/images/default/artist_small.jpg');

            return $playlist;
        });
    }
}
