<?php

use Illuminate\Http\Request;
use App\Specialization;
use App\Address;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('specializations/{specialization}/subspecializations', function($specialization) {
    return Specialization::where('specialization_id', $specialization)->get();
});

Route::get('address/regions', function() {
    return Address::regions();
});

Route::get('address/regions/{region}/provinces', function($region) {
    return Address::provinces($region);
});

Route::get('address/regions/provinces/{province}/cities', function($province) {
    return Address::cities($province);
});

Route::get('address/regions/provinces/cities/{city}/baranggays', function($city) {
    return Address::baranggays($city);
});

Route::get('datatables/icd', 'DatatableController@icd');

Route::get('datatables/rvu', 'DatatableController@rvu');
