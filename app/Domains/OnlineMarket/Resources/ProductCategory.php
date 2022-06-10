<?php
namespace OnlineMarket\Resources;

use OnlineMarket\Fields\Store\TextField;
use OnlineMarket\Models\ProductCategory as ModelsProductCategory;

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