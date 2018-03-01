<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 27/02/2018
 * Time: 3:14 PM
 */

namespace App\Services\Artists;

use App\Services\Settings;
use App\Services\Providers\ProviderResolver;
use App\ApiRequest;

class ArtistRequestRepository
{
    /**
     * @var Settings
     */
    private $settings;

    /**
     * @var ProviderResolver
     */
    private $resolver;

    private $apiRequest;

    /**
     * ArtistsRepository constructor.
     *
     * @param $apiRequest
     * @param Settings $settings
     * @param ProviderResolver $resolver
     */
    public function __construct(ApiRequest $apiRequest,
                                Settings $settings,
                                ProviderResolver $resolver
    )
    {
        $this->apiRequest = $apiRequest;
        $this->settings = $settings;
        $this->resolver = $resolver;
    }

    /**
     * Get artist by name.
     * @return array
     */
    public function get()
    {
        return $this->apiRequest->authGet('me/artist-request');
//        return response()->json($resp['body']->data, 200);
    }

    /**
     * Create a new artist request.
     *
     * @param array $params
     * @return
     */
    public function create($params)
    {
        $params['username'] = \Auth::user()->reference;
        return $this->apiRequest->postAuthorizedData('me/artist-request', $params);
    }
}