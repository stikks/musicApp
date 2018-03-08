<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 05/02/2018
 * Time: 6:43 PM
 */

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Auth;

class ApiRequest
{

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('api.url')]);
    }

    private function successResponse($data=array('*')) {
        return [
            'status' => true,
            'body' => $data
        ];
    }

    private function errorResponse($data=array('*')) {
        return [
            'status' => false,
            'body' => $data
        ];
    }

    public function basicGet($endpoint) {

        try {
            $resp = $this->client->request('GET', $endpoint, [
                    'debug' => false,
                    'auth' => [
                        config('api.client_id'),
                        config('api.client_secret'),
                    ],
                ]
            );
            return $this->successResponse(json_decode($resp->getBody()->getContents()));
        } catch (ClientException $e) {
            return $this->errorResponse(json_decode($e->getResponse()->getBody()->getContents()));
        }
    }

    public function all($endpoint) {

        try {
            $resp = $this->client->request('GET', $endpoint, [
                    'debug' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.Auth::getToken(),
                    ],
                ]
            );
            return $this->successResponse(json_decode($resp->getBody()->getContents()));
        } catch (ClientException $e) {
            return $this->errorResponse(json_decode($e->getResponse()->getBody()->getContents()));
        }
    }

    public function authGet($endpoint) {
        try {
            $resp = $this->client->request('GET', $endpoint, [
                    'debug' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.Auth::getToken(),
                    ]
                ]
            );
            return $this->successResponse(json_decode($resp->getBody()->getContents()));
        } catch (ClientException $e) {
            return $this->errorResponse(json_decode($e->getResponse()->getBody()->getContents()));
        }
    }


    public function postData($endpoint, $data=array(), $headers=array(), $auth=array()) {

        try {
            $head = array_merge([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ], $headers);

            $query = [
                'debug' => false,
                'form_params' => $data,
                'headers' => $head,
            ];

            if (count($auth)) {
                $query['auth'] = $auth;
            }

            $resp = $this->client->request('POST', $endpoint, $query);
            return $this->successResponse(json_decode($resp->getBody()->getContents()));
        } catch (ClientException $e) {
            return $this->errorResponse(json_decode($e->getResponse()->getBody()->getContents()));
        }
    }

    public function postAuthorizedData($endpoint, $data) {
        return $this->postData($endpoint, $data, ['Authorization' => 'Bearer '.Auth::getToken()]);
    }

    public function basicPost($endpoint, $data) {
        return $this->postData($endpoint, $data, [], [
            config('api.client_id'),
            config('api.client_secret'),
        ]);
    }

    public function getUser($token) {
        try {
            $resp = $this->client->request('GET', 'me', [
                    'debug' => false,
                    'headers' => [
                        'Authorization' => 'Bearer '.$token ,
                    ],
                ]
            );
            return $this->successResponse(json_decode($resp->getBody()->getContents()));
        } catch (ClientException $e) {
            return $this->errorResponse(json_decode($e->getResponse()->getBody()->getContents()));
        }
    }
}