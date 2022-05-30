<?php
namespace App\Http\Services;

use App\Models\ProductCategory;

class ProductCategoryService extends AbstractService
{
    protected $model = ProductCategory::class;
    
    public function index()
    {
        //custom logic
        return $this->model::all();
    }
}
