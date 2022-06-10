<?php
namespace OnlineMarket\Resources;

use OnlineMarket\Fields\Store\MoneyField;
use OnlineMarket\Fields\Store\TextField;
use OnlineMarket\Models\Product as ModelsProduct;

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