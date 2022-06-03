<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
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
}
