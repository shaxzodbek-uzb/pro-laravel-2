<?php
namespace App\Fields\Store;

class MoneyField extends Field
{
    protected $defaultRules = 'numeric';

    public function fill($object, $data)
    {
        $object->{$this->getName()} = $data[$this->getName()] * 100;
    }
}