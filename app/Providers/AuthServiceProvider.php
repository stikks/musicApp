<?php

namespace App\Providers;

use App\Album;
use App\Artist;
use App\Genre;
use App\Group;
use App\Localization;
use App\Lyric;
use App\MailTemplate;
use App\Page;
use App\Playlist;
use App\Setting;
use App\Track;
use App\Upload;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Auth;
use App\CustomUser;
use App\DataSources\MemCached as MemCachedSource;
use App\Guards\TokenGuard;
use App\ApiRequest;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'PermissionsPolicy' => \App\Policies\PermissionsPolicy::class,
        'AppearancePolicy'  => \App\Policies\AppearancePolicy::class,
        'ReportPolicy'      => \App\Policies\ReportPolicy::class,
        Upload::class       => \App\Policies\UploadPolicy::class,
        User::class         => \App\Policies\UserPolicy::class,
        Group::class        => \App\Policies\GroupPolicy::class,
        Setting::class      => \App\Policies\SettingPolicy::class,
        Page::class         => \App\Policies\PagePolicy::class,
        Localization::class => \App\Policies\LocalizationPolicy::class,
        MailTemplate::class => \App\Policies\MailTemplatePolicy::class,
        Track::class        => \App\Policies\TrackPolicy::class,
        Album::class        => \App\Policies\AlbumPolicy::class,
        Artist::class       => \App\Policies\ArtistPolicy::class,
        Lyric::class        => \App\Policies\LyricPolicy::class,
        Playlist::class     => \App\Policies\PlaylistPolicy::class,
        Genre::class        => \App\Policies\GenrePolicy::class,
    ];

    private function registerCustom()
    {
        // jwt authentication
        $this->app->bind('App\DataSources\MemCached', function($app) {
            return new MemCachedSource(config('token.host'), config('token.port'));
        });

        $this->app->bind('App\CustomUser', function($app) {
            return new CustomUser($app->make('App\DataSources\MemCached'));
        });

        // adding custom provider
        $this->app['auth']->provider('custom', function ($app, $config) {
            return new CustomProvider($app->make('App\CustomUser'), new ApiRequest());
        });

        Auth::extend('memcache', function ($app, $name, array $config) {
            return new TokenGuard(Auth::createUserProvider($config['provider']), $app->make('request'));
        });
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerCustom();
    }
}

//http://78.157.209.138:9000/images/ruthb.png?X-Amz-Algorithm\u003dAWS4-HMAC-SHA256\u0026X-Amz-Credential\u003dB7RM5W6G5KS4238KAGQH%2F20180215%2Fus-east-1%2Fs3%2Faws4_request\u0026X-Amz-Date\u003d20180215T100025Z\u0026X-Amz-Expires\u003d604800\u0026X-Amz-SignedHeaders\u003dhost\u0026X-Amz-Signature\u003d22a3120ea0f503609f534d9064e8f369c15ec4d753bc4d002d662822ae184d64
//
//http://78.157.209.138:9000/images/ruthb.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=B7RM5W6G5KS4238KAGQH%2F20180215%2F%2Fs3%2Faws4_request&X-Amz-Date=20180215T100128Z&X-Amz-Expires=432000&X-Amz-SignedHeaders=host&X-Amz-Signature=574cbc5f07dd9e759e2b33bbc6133f1a6c7bf325af49a3d8cef1f2541612fe63