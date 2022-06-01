<?php
namespace App\Fields\Store;

use Illuminate\Support\Str;

class Field
{
    protected $name;
    protected $rules;
    protected $defaultRules;

    public function __construct($name) {
        $this->name = $name;
    }
    public function getType()
    {
        return 'text';
    }

    function setRules($rules){
        $this->rules = $rules;
        return $this;
    }

    function getRules(){
        // slpit rules by |
        $rules = explode('|', $this->rules);
        $defaultRules = explode('|', $this->defaultRules);
        // merge rules
        return array_merge($defaultRules, $rules);
    }
    // setter name
    function setName($name){
        $this->name = $name;
        return $this;
    }
    // getter name
    function getName(){
        return $this->name;
    }
    public static function make($name)
    {
        $class = get_called_class();

        return new $class($name);
    }

    public function fill($object, $data)
    {
        $object->{$this->getName()} = $data[$this->getName()];
    }
}