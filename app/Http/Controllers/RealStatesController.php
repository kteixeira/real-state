<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealStateRequestCreate;
use App\Http\Requests\RealStateRequestUpdate;
use App\RealState;
use GuzzleHttp;

class RealStatesController extends Controller
{
    /**
     * @return mixed
     */
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

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
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

    /**
     * @param RealStateRequestCreate $realState
     * @return mixed
     */
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

    /**
     * @param RealStateRequestUpdate $request
     * @param RealState $realState
     * @return mixed
     */
    public function update(RealStateRequestUpdate $request, RealState $realState)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('PUT', 'http://localhost:8000/api/real_states/' . $realState->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'name' => $request->name,
                'description' => $request->description
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param RealState $realState
     * @return mixed
     */
    public function show(RealState $realState)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('GET', 'http://localhost:8000/api/real_states/' . $realState->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param RealState $realState
     * @return mixed
     */
    public function destroy(RealState $realState)
    {
        $http = new GuzzleHttp\Client;
        $apiCredentials = session('api_credentials');

        $response = $http->request('DELETE', 'http://localhost:8000/api/real_states/' . $realState->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
