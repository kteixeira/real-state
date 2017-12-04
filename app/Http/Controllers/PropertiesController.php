<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequestCreate;
use GuzzleHttp;

class PropertiesController extends Controller
{
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

    public function update()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('PUT', 'http://localhost:8000/api/properties/4', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'real_states_id' => 2,
                'type' => 0,
                'description' => "Lorenzão creizi",
                'address' => "rua do Lorenzão creizi"
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function show()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/properties/4', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function destroy()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('DELETE', 'http://localhost:8000/api/properties/5', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
