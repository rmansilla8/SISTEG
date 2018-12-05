<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class InicialPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testInicialPage()
    {
        sleep(5);
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('SISTEG');
        });
        session()->flush();
    }
}
