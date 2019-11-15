<?php

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


Route::get('/front', "FrontController@home")->name('front');
Route::get('/front/contact-us', "FrontController@contactUs")->name('contactUs');
Route::get('/front/news', "FrontController@news")->name('frontNews');



Route::get('/front/products', "FrontController@category")->name('categoryProducts');
Route::get('/front/products/{product}', "FrontController@product")->name('productDetail');

Route::get('/front/login', "Auth\CustomerAuthController@showRegistrationForm")->name('cutomerRegisterForm');
Route::post('/front/register', "Auth\CustomerAuthController@register")->name('cutomerRegister');
Route::post('/front/login', "Auth\CustomerAuthController@loginCustomer")->name('cutomerLogin');
Route::post('/front/logout', "Auth\CustomerAuthController@logout")->name('cutomerLogout');

Route::get('/front/cart/', "FrontController@getCart")->name('cart');
Route::post('/front/cart/', "FrontController@addToCart")->name('addToCart');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\AdminAuthController@showLoginForm')->name('adminLoginForm');
Route::post('/login', "Auth\AdminAuthController@loginAdmin")->name('adminLogin');
Route::get('/register', "Auth\AdminAuthController@showRegisterForm")->name('adminRegisterForm');
Route::post('/register', "Auth\AdminAuthController@create")->name('adminRegister');




Route::get('/logut', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::resource('adminRoles', 'AdminRoleController');

Route::resource('admins', 'AdminController');

Route::resource('customers', 'CustomerController');

Route::resource('suppliers', 'SupplierController');

Route::resource('brands', 'BrandController');

Route::resource('categories', 'CategoryController');

Route::resource('subCategories', 'SubCategoryController');

Route::resource('products', 'ProductController');

Route::resource('purchaseInvoices', 'PurchaseInvoiceController');

Route::resource('newsCategories', 'NewsCategoryController');

Route::resource('news', 'NewsController');

Route::resource('newsComments', 'NewsCommentController');

Route::resource('couriers', 'CourierController');

Route::resource('addresses', 'AddressController');

Route::resource('orders', 'OrderController');

Route::resource('promotions', 'PromotionController');

Route::resource('shipmentMethods', 'ShipmentMethodController');

Route::resource('shippingCosts', 'ShippingCostController');

Route::resource('deliveryOrders', 'DeliveryOrderController');

Route::resource('coupons', 'CouponController');

Route::get('/ongkir-isi', function(){

  $auth_data =
  [
    "grant_type"=>"password",
    "client_id"=>"id1",
    "client_secret"=>"secret1",
    "username"=>"shipping01",
    "password"=>"secret"
  ];



  $auth = Curl::to('http://172.104.182.116/index.php/oauth/access_token')
  ->withData( $auth_data )
  ->asJson()
  ->post();



  $provinces = Curl::to('http://172.104.182.116/index.php/province')
  ->asJson()
  ->get();

  foreach ($provinces->data as $key => $province) {

    $city = Curl::to('http://172.104.182.116/index.php/city/province/'.$province->id)
    ->asJson()
    ->get();

    $propinsi = new App\Province();

    $propinsi->name = $province->name;

    $propinsi->save();

    foreach ($city->data as $key => $value)
    {

      $kabupaten = new App\City();

      $kabupaten->name = $value->name;

      $kabupaten->provinsi_id = $propinsi->id;

      $kabupaten->save();


      $data2 =
      [
        "access_token"=> $auth->access_token,
        "carrier"=>1,
        "service"=>2,
        "origin"=>151,
        "destination"=>$value->id,
        "view"=>"minimal"
      ];

      $data3 =
      [
        "access_token"=> $auth->access_token,
        "carrier"=>1,
        "service"=>1,
        "origin"=>151,
        "destination"=>$value->id,
        "view"=>"minimal"
      ];

        $temp = Curl::to('http://172.104.182.116/index.php/ongkir')
        ->withData($data2)
        ->post();

        $temp2 = Curl::to('http://172.104.182.116/index.php/ongkir')
        ->withData($data3)
        ->post();

        $price = json_decode($temp, true);
        $price2 = json_decode($temp2, true);


        var_dump($price);


        if(!empty($price['data'][0]))
        {
          $value->price = $price['data'][0]['price'];
          $kabupaten->shipping_methods()->attach(1, ['shipping_cost' => $price['data'][0]['price']]);
        }
        else
        {
          $value->price = 0;
          $kabupaten->shipping_methods()->attach(1, ['shipping_cost' => 0 ]);
        }

        if(!empty($price2['data'][0]))
        {
          $kabupaten->shipping_methods()->attach(2, ['shipping_cost' => $price2['data'][0]['price']]);
        }
        else
        {
          $kabupaten->shipping_methods()->attach(2, ['shipping_cost' => 0]);
        }
    }

    $province->cities = $city;


  }

  return json_encode($provinces);

});


Route::resource('sliders', 'SliderController');
