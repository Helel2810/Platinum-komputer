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
Route::get('/front/news/{news}', "FrontController@newsDetail")->name('frontNewsDetail');
Route::post('/front/news/{news}/comment', "FrontController@newsPostComment")->name('newsPostComment');


Route::get('/front/profile/', "FrontController@newsDetail")->name('frontProfile');
Route::get('/front/profile/edit', "FrontController@editProfileForm")->name('frontProfileEditForm');
Route::post('/front/profile/edit', "FrontController@postEditProfile")->name('frontProfileEdit');
Route::get('/front/profile/address', "FrontController@addressList")->name('frontAddressList');
Route::delete('/front/profile/address/{address}', "FrontController@deleteAddress")->name('frontDeleteAddress');
Route::get('/front/profile/address/add', "FrontController@addressForm")->name('frontAddressForm');
Route::post('/front/profile/address/add', "FrontController@postAddress")->name('frontAddressAdd');
Route::get('/front/profile/orders', "FrontController@getOrders")->name('getOrders');
Route::get('/front/profile/orders/{id}', "FrontController@getOrderDetail")->name('getOrderDetail');
Route::post('/front/profile/orders/{id}/confirm-payment', "FrontController@postPaymentProof")->name('postPaymentProof');
Route::get('/front/profile/orders/{id}/confirm-receive', "FrontController@postConfirmReceive")->name('postConfirmReceive');

Route::get('/front/products', "FrontController@category")->name('categoryProducts');
Route::get('/front/products/{product}', "FrontController@product")->name('productDetail');
Route::post('/front/products/{product}/comment', "FrontController@productPostComment")->name('productPostComment');

Route::get('/front/login', "Auth\CustomerAuthController@showRegistrationForm")->name('cutomerRegisterForm');
Route::post('/front/register', "Auth\CustomerAuthController@create")->name('cutomerRegister');
Route::post('/front/login', "Auth\CustomerAuthController@loginCustomer")->name('cutomerLogin');
Route::get('/front/logout', "Auth\CustomerAuthController@logout")->name('cutomerLogout');

Route::get('/front/cart/', "FrontController@getCart")->name('cart');
Route::post('/front/cart/', "FrontController@addToCart")->name('addToCart');
Route::put('/front/cart/update', "FrontController@updateCart")->name('updateCart');
Route::get('/front/cart/clear', "FrontController@clearCart")->name('clearCart');
Route::get('/front/cart/delete/{id}', "FrontController@removeFromCart")->name('removeFromCart');

Route::get('/front/checkout/', "FrontController@getCheckout")->name('getCheckout');
Route::post('/front/checkout/', "FrontController@postCheckout")->name('postCheckout');




Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'Auth\AdminAuthController@showLoginForm')->name('adminLoginForm');
Route::post('/login', "Auth\AdminAuthController@loginAdmin")->name('adminLogin');
Route::get('/register', "Auth\AdminAuthController@showRegisterForm")->name('adminRegisterForm');
Route::post('/register', "Auth\AdminAuthController@create")->name('adminRegister');

Route::post('/logout', 'Auth\AdminAuthController@logout')->name('adminLogout');

Route::get('/orders/{id}/approve', "OrderController@approveOrder")->name('approveOrder');
Route::get('/orders/{id}/reject', "OrderController@rejectOrder")->name('rejectOrder');

Route::get('/payments/{id}/approve', "PaymentController@approvePayment")->name('approvePayment');
Route::get('/payments/{id}/reject', "PaymentController@rejectPayment")->name('rejectPayment');

Route::post('/delivery/{id}/send', "DeliveryOrderController@sendDeliveryOrder")->name('sendDeliveryOrder');


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

Route::resource('sliders', 'SliderController');

Route::resource('payments', 'PaymentController');

Route::resource('productComments', 'ProductCommentController');
