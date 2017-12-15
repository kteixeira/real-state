<?php

namespace App\Http\Controllers;

use App\Http\Requests\RealStateRequestCreate;
use App\Http\Requests\RealStateRequestUpdate;
use App\RealState;
use App\Services\RealState as RealStateService;

class RealStatesController extends Controller
{
    private $realStateService;

    public function __construct()
    {
        $this->realStateService = new RealStateService();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->realStateService->getRealStates();
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function getFormatted()
    {
        return $this->realStateService->getFormattedRealStates();
    }

    /**
     * @param RealStateRequestCreate $realStateRequest
     * @return mixed
     */
    public function store(RealStateRequestCreate $realStateRequest)
    {
        return $this->realStateService->postRealState($realStateRequest);
    }

    /**
     * @param RealStateRequestUpdate $realStateRequest
     * @param RealState $realState
     * @return mixed
     */
    public function update(RealStateRequestUpdate $realStateRequest, RealState $realState)
    {
        return $this->realStateService->putRealState($realStateRequest, $realState);
    }

    /**
     * @param RealState $realState
     * @return mixed
     */
    public function show(RealState $realState)
    {
        return $this->realStateService->getRealState($realState);
    }

    /**
     * @param RealState $realState
     * @return mixed
     */
    public function destroy(RealState $realState)
    {
        return $this->realStateService->deleteRealState($realState);
    }
}
