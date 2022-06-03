<?php

namespace Tests\Unit;

use App\Http\Services\ResourceService;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_resource_service_fields_setter_getter()
    {
        $fields = [
            'name' => 'field',
        ];
        $model = Product::class;
        $resource = new ResourceService($model, $fields);
        $got_fields = $resource->getFields();
       
        $this->assertEquals($fields, $got_fields);
    }
}
