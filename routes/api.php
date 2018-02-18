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
    return Address::select('region_id', 'region')
        ->get()
        ->unique('region_id')
        ->values();
});

Route::get('address/regions/{region}/provinces', function($region) {
    return Address::select('province_id', 'province')
        ->where('region_id', $region)
        ->get()
        ->unique('province_id')
        ->values();
});

Route::get('address/regions/provinces/{province}/cities', function($province) {
    return Address::select('city_id', 'city')
        ->where('province_id', $province)
        ->get()
        ->unique('city_id')
        ->values();
});

Route::get('address/regions/provinces/cities/{city}/baranggays', function($city) {
    return Address::select('baranggay_id', 'baranggay', 'zipcode')
        ->where('city_id', $city)
        ->get()
        ->unique('baranggay_id')
        ->values();
});
