<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequestCreate;
use App\Http\Requests\PropertyRequestUpdate;
use App\Http\Resources\Property as PropertyResources;
use App\Property;
use App\RealState;

class PropertiesController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PropertyResources::collection(Property::paginate(request()->per_page?: 10));
    }

    /**
     * @param PropertyRequestCreate $request
     * @return PropertyResources|\Illuminate\Http\JsonResponse|static
     * @internal param RealState $realState
     */
    public function store(PropertyRequestCreate $request)
    {
        try{
            return PropertyResources::make(Property::create($request->all()));
        }catch (\Exception $exception){
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PropertyRequestUpdate $request
     * @param  \App\Property $property
     * @return PropertyResources
     */
    public function update(PropertyRequestUpdate $request, Property $property)
    {
        try{
            $property->update($request->all());

            return PropertyResources::make($property);
        }catch (\Exception $exception){
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * @param Property $property
     * @return PropertyResources
     */
    public function show(Property $property)
    {
        return PropertyResources::make($property);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return array
     */
    public function destroy(Property $property)
    {
        try {
            $property->delete();

            return response()->json([
                'error' => false,
                'message' => 'Imóvel deletado com sucesso.'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
