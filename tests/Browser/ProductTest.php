<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProductTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('#email', 'shaxzodbek.qambaraliyev@gmail.com')
                ->type('#password', 'password')
                ->press('.login-button')
                ->waitForLocation('/dashboard')
                ->visit('/products')
                // ->type('#email', 'shaxzodbek.qambaraliyev@gmail.com')
                // ->type('#password', 'password')
                // ->press('.login-button')
                // ->waitForLocation('/dashboard')
                ->assertSee('PRODUCT NAME');
        });
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/products/create')
                ->type('#name', 'Iphone 11')
                ->type('#price', '4500')
                // ->type('#password', 'password')
                ->press('#submitButton')
                ->waitForLocation('/products')
                ->assertSee('Iphone 11');
        });
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEdit()
    {
        $this->browse(function (Browser $browser) {
            $product = \App\Models\Product::first();
            $browser->visit('/products/'. $product->id .'/edit')
                ->type('#name', $product->name . ' updated')
                ->type('#price', $product->price * 10)
                ->press('#saveButton')
                ->waitForLocation('/products')
                ->assertSee($product->name . ' updated');
        });
    }
}
