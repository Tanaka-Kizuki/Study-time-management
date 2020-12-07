<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function testBasicExample()
    {

        $this->browse(function (Browser $browser) {
            //Header Link Test
            $browser->visit('/')
                ->clickLink('Home')
                ->assertPathIs('/');
            $browser->visit('/')
                ->clickLink('Login')
                ->assertPathIs('/login');
            $browser->visit('/')
                ->clickLink('Register')
                ->assertPathIs('/register');
        });
    }
}
