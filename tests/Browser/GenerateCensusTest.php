<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GenerateCensusTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testGeneratePDF()
    {
        sleep(5);
        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $browser->clickLink('Iniciar sesión');
            $browser->visit('/login');
            $browser->type('email', 'registrador@gmail.com');
            $browser->type('password', 'Registrador123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            $browser->visit('/affiliates');
            $browser->clickLink('Imprimir');
            $browser->visit('/get-pdf-census');
            $browser->visit('/home');
            $browser->clickLink('Cerrar Sesión');
            $browser->assertPathIs('/');
        });
        session()->flush();
    }
}
