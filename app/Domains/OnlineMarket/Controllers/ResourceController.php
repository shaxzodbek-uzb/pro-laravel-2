<?php

namespace OnlineMarket\Controllers;

use OnlineMarket\Services\ResourceService;

class ResourceController extends AbstractController
{
    public function __construct() {
        if(request()->route()){
            $resourceName = request()->route()->parameters['resource'];
            $resourceName = str()->singular($resourceName);
            $className = str($resourceName)->studly();
            $resource = new ("OnlineMarket\\Resources\\$className");
            $this->service = new ResourceService(
                $resource->model,
                $resource->getFields()
            );
        }
    }
}
