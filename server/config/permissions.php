<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 26/02/2018
 * Time: 2:04 PM
 */
return [
    'guest' => [
        'artists.view' => 1,
        'albums.view' => 1,
        'tracks.view' => 1,
        'genres.view' => 1,
        'lyrics.view' => 1,
        'users.view'  => 1,
        'pages.view' => 1,
    ],
    'user' => [
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
    ],
    'artist' => [
        'self.update' => 1,
        'albums.create' => 1,
        'albums.update' => 1,
        'albums.delete' => 1,
        'tracks.create' => 1,
        'tracks.update' => 1,
        'tracks.delete' => 1
    ],
    'aggregator' => [
        'artists.create' => 1,
        'artists.update' => 1,
        'albums.create' => 1,
        'albums.update' => 1,
        'albums.delete' => 1,
        'tracks.create' => 1,
        'tracks.update' => 1,
        'tracks.delete' => 1,
    ],
    'admin' => [
        'artists.create' => 1,
        'artists.update' => 1,
        'artists.delete' => 1,
        'albums.create' => 1,
        'albums.update' => 1,
        'albums.delete' => 1,
        'tracks.create' => 1,
        'tracks.update' => 1,
        'tracks.delete' => 1,
        'genres.create' => 1,
        'genres.update' => 1,
        'genres.delete' => 1,
    ]
];