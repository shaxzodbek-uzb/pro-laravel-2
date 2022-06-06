<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('#email', 'shaxzodbek.qambaraliyev@gmail.com')
                    ->type('#password', 'password')
                    ->press('.login-button')
                    ->waitForLocation('/dashboard')
                    ->assertSee('Shaxzodbek');
        });
    }
}
