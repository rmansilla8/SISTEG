<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterUserTest extends DuskTestCase
{
    /**
     * @var FakerGenerator
     */
    protected $faker;

    /**
     * Setup faker
     */
    public function setUp()
    {
        parent::setUp();
        $this->faker = \Faker\Factory::create();
    }
    /**
     * My test implementation
     */
    public function testUserRegister()
    {
        sleep(5);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'administrador@gmail.com');
            $browser->type('password', 'Admin123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            $browser->visit('/users');
            $browser->press('Nuevo Registro');
            $browser->value('#name', '$this->faker->name');
            $browser->value('#email', '$this->faker->email');
            $browser->value('#password', 'jorge123.');
            $browser->select('role_id', '2');
            $browser->select('permission_id', '2');
            $browser->value('#status', 'on');
            $browser->press('Guardar');
            $browser->clickLink('Cerrar Sesión');
            $browser->assertPathIs('/');
        });
        session()->flush();
    }
}
