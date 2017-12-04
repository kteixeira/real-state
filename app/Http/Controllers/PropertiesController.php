<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequestCreate;
use App\Http\Requests\PropertyRequestUpdate;
use App\Property;
use GuzzleHttp;

class PropertiesController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/properties', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param PropertyRequestCreate $request
     * @return mixed
     */
    public function store(PropertyRequestCreate $request)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->post('http://localhost:8000/api/properties', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'real_states_id' => $request->real_states_id,
                'type' => $request->type,
                'description' => $request->description,
                'address' => $request->address
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param PropertyRequestUpdate $request
     * @param Property $property
     * @return mixed
     */
    public function update(PropertyRequestUpdate $request, Property $property)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('PUT', 'http://localhost:8000/api/properties/' . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'real_states_id' => $request->real_states_id,
                'type' => $request->type,
                'description' => $request->description,
                'address' => $request->address
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param Property $property
     * @return mixed
     */
    public function show(Property $property)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/properties/' . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param Property $property
     * @return mixed
     */
    public function destroy(Property $property)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('DELETE', 'http://localhost:8000/api/properties/' . $property->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
