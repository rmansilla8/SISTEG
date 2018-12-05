<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('SISTEG');
        });
    }

    public function testLogin()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $browser->clickLink('Iniciar sesión');
            $browser->visit('/login');
            $browser->type('email', 'administrador@gmail.com');
            $browser->type('password', 'Admin123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            $browser->clickLink('Cerrar Sesión');
            $browser->assertPathIs('/');
        });

    }


}
