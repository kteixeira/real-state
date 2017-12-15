<?php
/**
 * Created by PhpStorm.
 * User: heisenberg
 * Date: 15/12/17
 * Time: 14:21
 */

namespace App\Services;
use GuzzleHttp;

class Property
{
    const uri = 'http://localhost:8000/api/properties';
    private $http;

    public function __construct()
    {
        $this->http = new GuzzleHttp\Client;
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('GET', $this::uri, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function postProperty($property)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->post($this::uri, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'real_states_id' => $property->real_states_id,
                'type' => $property->type,
                'description' => $property->description,
                'address' => $property->address
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function putProperty($propertyRequest, $property)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('PUT', $this::uri . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'real_states_id' => $propertyRequest->real_states_id,
                'type' => $propertyRequest->type,
                'description' => $propertyRequest->description,
                'address' => $propertyRequest->address
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function getProperty($property)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('GET', $this::uri . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param $property
     * @return mixed
     */
    public function deleteProperty($property)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('DELETE', $this::uri . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}