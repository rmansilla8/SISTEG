<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class LogingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /**
     * My test implementation
     */
    public function testLoging()
    {
        $this->visit('/');
        $this->visit('/login');
        $this->type('administrador@gmail.com', 'email');
        $this->type('Admin123.', 'password');
        $this->press('Ingresar');
        $response->$this->seePageIs('/home');
        $response->assertStatus(200);


    }
}
