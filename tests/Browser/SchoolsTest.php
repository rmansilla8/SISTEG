<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SchoolsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSchools()
    {
        sleep(5);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login');
            $browser->type('email', 'administrador@gmail.com');
            $browser->type('password', 'Admin123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            $browser->visit('/schools');
            $browser->press('Nuevo Registro');
            $browser->value('#code', '20');
            $browser->value('#name', 'Escuela Oficial Rural Mixta');
            $browser->select('level_id', '8');
            $browser->select('school_district_id', '2');
            $browser->select('area_id', '7');
            $browser->select('classification_id', '7');
            $browser->select('modality_id', '7');
            $browser->select('working_day_id', '7');
            $browser->select('plan_id', '7');
            $browser->value('#address', 'Barrio Nuevo');
            $browser->press('Guardar');
            $browser->clickLink('Cerrar Sesión');
            $browser->assertPathIs('/');
        });
        session()->flush();
    }
}
