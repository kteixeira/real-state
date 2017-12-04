<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RealStateRequestCreate;
use App\Http\Requests\RealStateRequestUpdate;
use App\RealState;
use App\Http\Resources\RealState as RealStateResources;

class RealStatesController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RealStateResources::collection(RealState::paginate(request()->per_page?: 10));
    }

    /**
     * @param RealStateRequestCreate $request
     * @return RealStateResources | \Illuminate\Http\JsonResponse|static
     */
    public function store(RealStateRequestCreate $request)
    {
        try {
            return RealStateResources::make(RealState::create($request->all()));
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RealStateRequestUpdate  $request
     * @param  \App\RealState  $realState
     * @return RealStateResources
     */
    public function update(RealStateRequestUpdate $request, RealState $realState)
    {
        try {
            $realState->update($request->all());
            return RealStateResources::make($realState);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param RealState $realState
     * @return RealStateResources
     */
    public function show(RealState $realState)
    {
        return RealStateResources::make($realState);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RealState  $realState
     * @return array
     */
    public function destroy(RealState $realState)
    {
        try {
            $realState->delete();

            return [
                'error' => false,
                'message' => 'Imobiliária deletada com sucesso.'
            ];
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
