<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterAffiliateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegisterAffiliate()
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
            $browser->press('Nuevo Registro');
            $browser->value('#names', 'Camilo');
            $browser->value('#surnames', 'Camiles');
            $browser->value('#email', 'hola@gmail.com');
            $browser->value('#phone', '25478963');
            $browser->select('department_id', '18');
            $browser->select('municipality_id', '290');
            $browser->value('#address', 'Barrio El Mitchal');
            $browser->value('#birthdate', '1986-01-01');
            $browser->select('gender_id', '7');
            $browser->select('civil_state_id', '7');
            $browser->press('Next');
            $browser->value('#dpi', '2589687514712');
            $browser->value('#nit', '56687482');
            $browser->value('#scale_register', 'Q-258');
            $browser->select('ethnic_community_id', '10');
            $browser->select('title_id', '9');
            $browser->value('#year_title', '2009');
            $browser->value('#institution', 'Instituto Particular Mixto Dr. Pedro Molina');
            $browser->press('Next');
            $browser->select('school_id', '5');
            $browser->select('contract_id', '9');
            $browser->value('#year_start', '2009');
            $browser->select('work_state_id', '1');
            $browser->select('employee_type_id', '8');
            $browser->select('language_id', '28');
            $browser->radio('#speak', 'on');
            $browser->radio('#understand', 'on');
            $browser->radio('#read', 'on');
            $browser->radio('#write', 'on');
            $browser->press('Complete');
            $browser->clickLink('Cerrar Sesión');
            $browser->assertPathIs('/');
        });
        session()->flush();
    }
}
