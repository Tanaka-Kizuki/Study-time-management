<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Book;
use App\Study;
use App\User;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testExample()
    {
        factory(Book::class,10)->create();
        factory(User::class,10)->create();
        factory(Study::class,10)->create();
    }
}
