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

        //勉強記録がされてるかテスト
        $this->browse(function ($first, $second) {
            $user = factory(User::class)->create([
                'email' => 'test@laravel.com',
                'password' => 'secret'
            ]);

            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->assertSee('書籍登録')
                  ->clickLink('START')
                  ->assertPathIs('/start/record')
                  ->check('book_id')
                  ->type('subject','Laravel')
                  ->press("Let's Study")
                  ->visit('/home')
                  ->assertSee('Studying Now')
                  ->clickLink('FINISH')
                  ->assertPathIs('/finish/record')
                  ->type('memo','Laravel Finish')
                  ->press("Finish")
                  ->visit('/home')
                  ->assertSee('Laravel')
                  ->assertSee('Laravel Finish');
        });

        //書籍登録が出来るかテスト
        $this->browse(function ($first, $second) {
            $user = factory(User::class)->create([
                'email' => 'test2@laravel.com',
                'password' => 'secret'
            ]);

            $first->loginAs(User::find(1))
                  ->visit('/home')
                  ->clickLink('書籍登録')
                  ->assertPathIs('/book?id=1')
                  ->type('isbn','978-4-7980-5907-5')
                  ->press("検索")
                  ->assertSee('PHPフレームワークLaravel実践開発');
        });
        
    }
}
