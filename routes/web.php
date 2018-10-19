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

/*Route::get("generar", function(){
    $numeros=new Generate();
    $lista =$numeros->getNumbersGenerated(1000,true, 4);
    for ($i=1; $i < count($lista); $i++) {
        echo $lista[$i] . "<br />";
    }
});*/

//Route::resource('fees',   'FeesController');
Route::resource('fees', 'FeesController');
Route::get('get-fees', 'FeesController@getFees');
Route::get('get-fee_types', 'FeesController@getFeeType');
Route::get('get-affiliates', 'FeesController@getAffiliate');

Route::resource('accounting_records', 'AccountingRecordsController');
Route::get('get-accounting_records', 'AccountingRecordsController@getAccountingRecords');
Route::get('get-record_types', 'AccountingRecordsController@getRecordTypes');
//Route::post('fees/{fee}', 'FeesController@destroy')->name('eliminar');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('my-theme', function () {

    return view('welcome2');

});
