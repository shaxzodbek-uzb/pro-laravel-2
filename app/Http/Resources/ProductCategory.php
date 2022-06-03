<?php
namespace App\Http\Resources;

use App\Fields\Store\TextField;
use App\Models\ProductCategory as ModelsProductCategory;

class ProductCategory
{
    public $model = ModelsProductCategory::class;
    public function getFields()
    {
        return [
            TextField::make('name')->setRules('required'),
        ];
    }
}