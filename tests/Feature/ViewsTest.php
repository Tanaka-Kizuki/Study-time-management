<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertViewIs('welcome');

        //以降ログイン状態のみアクセス可能
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $response = $this->get('/home');
        $response->assertViewIs('index');

        $response = $this->get('/start/record');
        $response->assertViewIs('record');

        $response = $this->get('/finish/record');
        $response->assertViewIs('finish');

        $response = $this->get('/book');
        $response->assertViewIs('book');
    }
}
