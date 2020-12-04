<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        for($i=0;$i<100;$i++) {
            factory(User::class)->create();
        }
        $count = User::get()->count();
        $User = User::find(rand(1,$count));
        $data = $User->toArray();
        print_r($data);

        $this->assertDatabaseHas('User',$data);

        $User->delete();
        $this->assertDataBaseMissing('User',$data);

    }
}
