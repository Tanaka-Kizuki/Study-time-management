<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class ViewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    public function testExample()
    {
        //
        // 指定のviewファイルが表示されているかテスト
        //

        $response = $this->get('/');
        $response->assertViewIs('welcome');

        //以降ログイン状態のみアクセス可能
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $response = $this->get('/home');
        $response->assertViewIs('index');
        $response->assertViewHas('params');

        $response = $this->get('/start/record');
        $response->assertViewIs('record');
        $response->assertViewHas('books');

        $response = $this->get('/finish/record');
        $response->assertViewIs('finish');

        $response = $this->get('/book');
        $response->assertViewIs('book');
    }
}
