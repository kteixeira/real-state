<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealStateRequestCreate;
use GuzzleHttp;

class RealStatesController extends Controller
{
    public function index()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/real_states', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function getFormatted()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/real_states', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        $realStates = json_decode((string) $response->getBody(), true);

        if(!isset($realStates['data']) || count($realStates['data']) == 0){
            response('Erro ao buscar imobiliárias formatadas', 400);
        }

        $return = [];

        foreach ($realStates['data'] as $data) {
            $return[$data['id']] = $data['name'];
        }

        return response($return, 200);
    }

    public function store(RealStateRequestCreate $realState)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->post('http://localhost:8000/api/real_states', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'name' => $realState->name,
                'description' => $realState->description
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function update()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('PUT', 'http://localhost:8000/api/real_states/3', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'name' => 'Imobiliária 3',
                'description' => 'Teste Imobiliária 3 Editando caraio'
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function show()
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/real_states/2', [
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

        $response = $http->request('DELETE', 'http://localhost:8000/api/real_states/3', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
