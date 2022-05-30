<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategory\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategory\ProductCategoryUpdateRequest;
use App\Http\Services\ProductCategoryService;

class ProductCategoryController extends AbstractController
{    
    public function __construct() {
        $this->service = new ProductCategoryService;
        $this->storeRequestClass = ProductCategoryStoreRequest::class;
        $this->updateRequestClass = ProductCategoryUpdateRequest::class;
    }
}
