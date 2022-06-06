<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_response()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_count_response()
    {
        $response = $this->get('/api/products');
        $count = count($response->getData()->items);
        $this->assertDatabaseCount('products', $count);
    }

    // store
    public function test_store_response()
    {
        $product_data = [
            'name' => 'Product test',
            'price' => '100',
        ];
        $response = $this->post('/api/products', $product_data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', ['name' => 'Product test']);

        $response->assertJsonStructure([
            'item' => [
                'name',
                'price',
                'updated_at',
                'created_at',
                'id',
            ]
        ]);

    }
    // update
    public function test_update_response()
    {
        $product = \App\Models\Product::first();
        $product->name = 'Product test updated';
        $product->_method = 'PUT';
        $response = $this->post('/api/products/' . $product->id, $product->toArray());

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', ['name' => $product->name]);

        $response->assertJsonStructure([
            'item' => [
                'id',
                'name',
                'price',
                'created_at',
                'updated_at',
            ]
        ]);

    }
    // delete
    public function test_delete_response()
    {
        $product = \App\Models\Product::first();
        $response = $this->delete('/api/products/' . $product->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', ['id' => $product->id]);

        $response->assertJsonStructure([
            'success',
            'id',
        ]);

    }
    
}
