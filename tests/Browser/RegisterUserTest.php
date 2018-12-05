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

        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'administrador@gmail.com');
            $browser->type('password', 'Admin123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            // $browser->clickLink('Navegación alterna');
            // $browser->clickLink('Administración');
            // $browser->clickLink('User');
            $browser->visit('/users');
            $browser->press('Nuevo Registro');
            $browser->type('name', '$this->faker->name');
            $browser->type('email', '$this->faker->email');
            $browser->type('password', 'jorge123.');
            $browser->select('role_id', '2');
            $browser->select('permission_id', '2');
            $browser->radio('#status', 'on');
            $browser->press('Guardar');
        });

    }
}
