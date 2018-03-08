<?php namespace App\Services;

use App\Playlist;
use App\User;
use App\Group;
use App\Artist;
use App\Localization;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\UserInfo;


class BootstrapData
{
    /**
     * @var Settings
     */
    private $settings;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Localization
     */
    private $localization;

    /**
     * @var Group
     */
    private $groups;

    /**
     * BootstrapData constructor.
     *
     * @param Settings $settings
     * @param Request $request
     * @param Localization $localization
     * @param Group $groups
     * @param Playlist $playlist
     */
    public function __construct(
        Settings $settings,
        Request $request,
        Localization $localization,
        Group $groups,
        Playlist $playlist
    )
    {
        $this->groups = $groups;
        $this->request = $request;
        $this->settings = $settings;
        $this->localization = $localization;
        $this->playlist = $playlist;
    }

    /**
     * Get data needed to bootstrap the application.
     *
     * @return string
     */
    public function get()
    {
        $bootstrap = [];
        $bootstrap['settings'] = $this->settings->all();
        $bootstrap['settings']['base_url'] = url('');
        $bootstrap['settings']['version'] = config('site.version');
        $bootstrap['csrf_token'] = csrf_token();
        $bootstrap['guests_group'] = array();
//        $bootstrap['guests_group'] = $this->groups->where('guests', 1)->first();
        $bootstrap['i18n'] = $this->getLocalizationsData() ?: null;
        $bootstrap['user'] = $this->getCurrentUser();
        $bootstrap['playlists'] = $this->playlist->get();
        $bootstrap['artist'] = null;

        if ($bootstrap['user']) {
            $bootstrap['tracks'] = $this->getUserTracks();
            $bootstrap['user'] = $this->loadUserFollowedUsers($bootstrap['user']);
            $bootstrap['playlists'] = $this->getUserPlaylists();
            $bootstrap['artist'] = Artist::where('user_info_id', $bootstrap['user']->id)->first();
        }

        return base64_encode(json_encode($bootstrap));
    }

    /**
     * Load current user and his groups.
     */
    private function getCurrentUser()
    {
        $user = $this->request->user();

//        if ($user && ! $user->relationLoaded('groups')) {
//            $user->load('groups');
//        }

        return $user;
    }

    /**
     * Load users that current user is following.
     *
     * @param User $user
     * @return User
     */
    private function loadUserFollowedUsers(UserInfo $user)
    {
        return $user->load(['followedUsers' => function(BelongsToMany $q) {
            return $q->select('user_info.id', 'user_info.avatar');
        }]);
    }

    /**
     * Get ids of all tracks in current user's library.
     *
     * @return array
     */
    private function getUserTracks()
    {
//        $user = $this->request->user()->info;
//        $artist = DB::table('artists')->where('user_id', $user->id)->first();
//        return !is_null($artist) ? DB::table('artists')->where('user_id', $user->id)->get() : array();
        return $this->request->user()->tracks()->pluck('tracks.id')->toArray();
    }

    /**
     * Get ids of all tracks in current user's library.
     *
     * @return array
     */
    private function getUserPlaylists()
    {
//        return $this->request->user()->getUserPlaylists();
        return $this->request->user()
            ->playlists()
            ->with(['editors' => function(BelongsToMany $q) {
                return $q->compact();
            }])
            ->select('playlists.id', 'playlists.name')
            ->get()
            ->toArray();
    }

    /**
     * Get currently selected i18n language.
     *
     * @return Localization
     */
    private function getLocalizationsData()
    {
        if ( ! $this->settings->get('i18n.enable')) return null;

        //get user selected language
        $userLang = $this->request->user() ? $this->request->user()->language : null;

        //get default language if user has not selected any languages
        if ( ! $userLang) {
            $userLang = $this->settings->get('i18n.default_localization');
        }

        if ($userLang) {
            return $this->localization->where('name', $userLang)->first();
        }
    }
}
