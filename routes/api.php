<?php

use Illuminate\Http\Request;

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

Route::post('/cities', function(Request $request){
  $cities = App\Models\City::where('province_id', $request->province_id);
  return response()->json(['cities' => $cities->orderBy('name')->get()]);
})->name('apiCities');

Route::post('/districts', function(Request $request){
  $districts = App\Models\District::where('city_id', $request->city_id);
  return response()->json(['districts' => $districts->orderBy('name')->get()]);
})->name('apiDistrict');

Route::post('/address-district', function(Request $request){
  $address = App\Models\Address::find($request->address_id);
  return response()->json(['district_id' => $address->district_id]);
})->name('apiAddressDistrict');


Route::post('/shippingCost', function(Request $request){
  $shippingCost = App\Models\ShippingCost::where('district_id', $request->district_id)->where('shipment_method_id', $request->shipment_method_id)->first();
  return response()->json(['shippingCost' => $shippingCost]);
})->name('apiShippingCost');
