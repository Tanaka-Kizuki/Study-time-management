<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use Auth;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create([
            'password'  => bcrypt('test1111')
        ]);
     
        // 認証されないことを確認
        $this->assertFalse(Auth::check());
     
        // ログインを実行
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'test1111'
        ]);
     
        // 認証されていることを確認
        $this->assertTrue(Auth::check());
     
        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('home');
    }
}
