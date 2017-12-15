<?php
/**
 * Created by PhpStorm.
 * User: heisenberg
 * Date: 15/12/17
 * Time: 14:21
 */

namespace App\Services;
use GuzzleHttp;

class RealState
{
    const uri = 'http://localhost:8000/api/real_states/';
    private $http;

    public function __construct()
    {
        $this->http = new GuzzleHttp\Client;
    }

    /**
     * @return mixed
     */
    public function getRealStates()
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

    /**
     * @param $realState
     * @return mixed
     */
    public function postRealState($realState)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->post($this::uri, [
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
     * @param $realStateRequest
     * @param $realState
     * @return mixed
     */
    public function putRealState($realStateRequest, $realState)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('PUT', $this::uri . $realState->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ],
            'form_params' => [
                'name' => $realStateRequest->name,
                'description' => $realStateRequest->description
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param $realState
     * @return mixed
     */
    public function getRealState($realState)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('GET', $this::uri . $realState->id, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiCredentials['token_type'] . ' ' . $apiCredentials['access_token']
            ]
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    /**
     * @param $realState
     * @return mixed
     */
    public function deleteRealState($realState)
    {
        $apiCredentials = session('api_credentials');

        $response = $this->http->request('DELETE', $this::uri . $realState->id, [
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
    public function getFormattedRealStates()
    {
        $realStates = $this->getRealStates();

        if(!isset($realStates['data']) || count($realStates['data']) == 0){
            response('Erro ao buscar imobiliárias formatadas', 400);
        }

        $return = [];

        foreach ($realStates['data'] as $data) {
            $return[$data['id']] = $data['name'];
        }

        return response($return, 200);
    }
}