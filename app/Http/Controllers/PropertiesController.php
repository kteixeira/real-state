<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequestCreate;
use App\Http\Requests\PropertyRequestUpdate;
use App\Property;
use App\Services\Property as PropertyService;

class PropertiesController extends Controller
{
    private $propertyService;

    public function __construct()
    {
        $this->propertyService = new PropertyService();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->propertyService->getProperties();
    }

    /**
     * @param PropertyRequestCreate $propertyRequest
     * @return mixed
     */
    public function store(PropertyRequestCreate $propertyRequest)
    {
        return $this->propertyService->postProperty($propertyRequest);
    }

    /**
     * @param PropertyRequestUpdate $propertyRequest
     * @param Property $property
     * @return mixed
     */
    public function update(PropertyRequestUpdate $propertyRequest, Property $property)
    {
        return $this->propertyService->putProperty($propertyRequest, $property);
    }

    /**
     * @param Property $property
     * @return mixed
     */
    public function show(Property $property)
    {
        return $this->propertyService->getProperty($property);
    }

    /**
     * @param Property $property
     * @return mixed
     */
    public function destroy(Property $property)
    {
       return $this->propertyService->deleteProperty($property);
    }
}
