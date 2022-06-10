<?php
namespace OnlineMarket\Fields\Store;

class FileField extends Field
{
    protected $defaultRules = 'file';

    public function fill($object, $data)
    {
        $file = $data[$this->getName()];
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $fileName);
        $object->{$this->getName()} = $fileName;
    }
}