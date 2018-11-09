<?php
use IntelGUA\Generators\Generate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');

});


Auth::routes();
// Auth::user()->ability('admin', 'todos');
// en las siguientes rutas si no esta logeado mandar a login
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');


    //Grupo de rutas al que solo el Admin puede acceder
    Route::group([
        'middleware' => ['permission:todos'],
    ], function () {
        Route::resource('users', 'UsersController');
        Route::get('get-users', 'UsersController@getUsers');
        Route::get('get-roles', 'UsersController@getRoles');
        Route::get('get-permissions', 'UsersController@getPermissions');
        Route::get('get-permissions', 'UsersController@getPermissions');
        Route::put('status/{id}', 'UsersController@Status');
        Route::get('get-status', 'UsersController@getStatus');

    });
    //Grupo de rutas al que solo el Admin y el registrador pueden acceder
        Route::group([
            'middleware' => ['permission:registrador'],
        ], function () {

            Route::resource('affiliates', 'affiliatesController');
            Route::get('get-all_affiliates', 'AffiliatesController@getAllAffiliates');
            Route::get('get-affiliates_states', 'AffiliatesController@getAffiliateStates');

            Route::get('get-departments', 'PeopleController@getDepartments');
            Route::get('get-municipalities/{department_id}', 'PeopleController@getMunicipalities');
            Route::get('get-genders', 'PeopleController@getGenders');
            Route::get('get-civil_states', 'PeopleController@getCivilStates');
            Route::resource('people', 'PeopleController');
            Route::get('get-ethnic_communities', 'EmployeesController@getEthnic_communities');
            Route::get('get-titles', 'EmployeesController@getTitles');

            Route::get('get-employee_types', 'EmployeeSchoolsController@getEmployee_types');
            Route::get('get-work_states', 'EmployeeSchoolsController@getWork_states');
            Route::get('get-contracts', 'EmployeeSchoolsController@getContracts');
            Route::get('get-schools', 'EmployeeSchoolsController@getSchools');
            Route::get('get-languages', 'EmployeeSchoolsController@getLanguages');

            Route::resource('schools', 'SchoolsController');
            Route::get('get-schools', 'SchoolsController@getSchools');
            Route::get('get-levels', 'SchoolsController@getLevel');
            Route::get('get-districts', 'SchoolsController@getDistrict');
            Route::get('get-areas', 'SchoolsController@getArea');
            Route::get('get-classifications', 'SchoolsController@getClassification');
            Route::get('get-modalities', 'SchoolsController@getModality');
            Route::get('get-working_days', 'SchoolsController@getWorkingDay');
            Route::get('get-plans', 'SchoolsController@getPlan');
    });

    //Grupo de rutas al que solo el de finanzas y el admin pueden acceder
    Route::group([
        'middleware' => ['permission:finanzas'],
    ], function () {

              //Route::resource('fees',   'FeesController');
        Route::resource('fees', 'FeesController');
        Route::get('get-fees', 'FeesController@getFees');
        Route::get('get-fee_types', 'FeesController@getFeeType');
        Route::get('get-affiliates', 'FeesController@getAffiliate');

        Route::resource('accounting_records', 'AccountingRecordsController');
        Route::get('get-accounting_records', 'AccountingRecordsController@getAccountingRecords');
        Route::get('get-record_types', 'AccountingRecordsController@getRecordTypes');
        //Route::post('fees/{fee}', 'FeesController@destroy')->name('eliminar');

    });
});
