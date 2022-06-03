<?php

namespace App\Http\Controllers;

use App\Fields\Store\MoneyField;
use App\Fields\Store\TextField;
use App\Http\Services\ResourceService;


class ResourceController extends AbstractController
{
    public function __construct() {
        $resourceName = request()->route()->parameters['resource'];
        $resourceName = str()->singular($resourceName);
        $className = str($resourceName)->studly();
        $resource = new ("App\\Http\\Resources\\$className");
        $this->service = new ResourceService(
            $resource->model,
            $resource->getFields()
        );
    }
}
