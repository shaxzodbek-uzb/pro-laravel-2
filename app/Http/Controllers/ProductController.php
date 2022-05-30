<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Services\ProductService;

class ProductController extends AbstractController
{
    public function __construct() {
        $this->service = new ProductService;
        $this->storeRequestClass = ProductStoreRequest::class;
        $this->updateRequestClass = ProductUpdateRequest::class;
    }
}
