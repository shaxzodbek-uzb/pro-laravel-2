<?php
namespace App\Http\Resources;

use App\Fields\Store\MoneyField;
use App\Fields\Store\TextField;
use App\Models\Product as ModelsProduct;

class Product
{
    public $model = ModelsProduct::class;
    public function getFields()
    {
        return [
            TextField::make('name')->setRules('required'),
            MoneyField::make('price')->setRules('required'),
        ];
    }
    
}