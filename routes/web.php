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
// Fontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::get('/contact','HomeController@contact');
//danh muc san pham trang home
Route::get('/danh-muc/{category_id}','Category@show_category_home');
Route::get('/thuong-hieu/{brand_id}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-sanpham/{product_id}','ProductController@details_product');

//backend

Route::get('/admin','AdminController@adminl');
Route::get('/homeadmin','AdminController@adminhome');
Route::get('/log-out','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Category


Route::get('/all-category-product','Category@all_category_product');

Route::post('/save-category','Category@save_category_product');

Route::post('/update-category-product/{category_id}','Category@edit_category_product');

// Brand


Route::get('/all-brand-product','BrandProduct@all_brand_product');



Route::post('/save-brand-product','BrandProduct@save_brand_product');

Route::post('/update-brand-product/{brand_id}','BrandProduct@edit_brand_product');

//Product
Route::get('/all-product','ProductController@all_product');
Route::group(['middleware' => 'auth.roles'], function () {
	Route::get('/add-product','ProductController@add_product');
	Route::get('/edit-product/{product_id}','ProductController@edit_product');
	Route::get('/delete-product/{product_id}','ProductController@delete_product');
	Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
	Route::get('/active-product/{product_id}','ProductController@active_product');
	Route::post('/save-product','ProductController@save_product');
	Route::post('/update-product/{product_id}','ProductController@update_product');
	
	//thuong hiệu
	Route::get('/update-brand-product/{brand_id}','BrandProduct@update_brand_product');
	Route::get('/delete-brand-product/{brand_id}','BrandProduct@delete_brand_product');
	Route::get('/unactive-brand/{brand_id}','BrandProduct@unactive_brand');
	Route::get('/active-brand/{brand_id}','BrandProduct@active_brand');
	Route::get('/add-brand-product','BrandProduct@add_brand_product');

	//danh mục sp
	Route::get('/add-category-product','Category@add_category_product');
	Route::get('/update-category-product/{category_id}','Category@update_category_product');
	Route::get('/delete-category-product/{category_id}','Category@delete_category_product');
	Route::get('/unactive-category/{category_id}','Category@unactive_category');
	Route::get('/active-category/{category_id}','Category@active_category');

	// quan lí đơn hàng

	Route::post('/update-order-qty','OrderController@update_order_qty');
	Route::post('/update-qty','OrderController@update_qty');
	Route::get('/delete-order/{order_code}','OrderController@order_code');
	Route::get('/view-order/{order_code}','OrderController@view_order');

	//quản lí ma giam gia

	Route::get('/insert-coupon','CouponController@insert_coupon');
	Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
	Route::post('/insert-coupon-code','CouponController@insert_coupon_code');

	Route::post('/select-delivery','DeliveryController@select_delivery');
	Route::post('/insert-delivery','DeliveryController@insert_delivery');
	Route::post('/select-feeship','DeliveryController@select_feeship');
	Route::post('/update-delivery','DeliveryController@update_delivery');
	Route::get('/delivery','DeliveryController@delivery');


});
// phân quyền user

Route::get('users','UserController@index')->middleware('auth.roles');
Route::get('add-users','UserController@add_users')->middleware('auth.roles');
Route::get('impersonate/{admin_id}','UserController@impersonate');
Route::get('delete-user-roles/{admin_id}','UserController@delete_user_roles')->middleware('auth.roles');
Route::post('store-users','UserController@store_users')->middleware('auth.roles');
Route::post('assign-roles','UserController@assign_roles')->middleware('auth.roles');

Route::get('impersonate-destroy','UserController@impersonate_destroy');






//check coupon
Route::post('/check-coupon','CartController@check_coupon');
//admin coupon

Route::get('/list-coupon','CouponController@list_coupon');

//gio hang

Route::post('/update-cart','CartController@update_cart');

Route::post('/update-cart-ajax','CartController@update_cart_ajax');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@del_all_product');
Route::get('/unset-coupon','CouponController@unset_coupon');

Route::get('/show-cart','CartController@show_cart_menu');


//checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/checkout-logout','CheckoutController@checkout_logout');

Route::post('/save-checkou-customer','CheckoutController@save_checkou_customer');

Route::post('/login-customer','CheckoutController@login_customer');


Route::post('/order-place','CheckoutController@order_place');

Route::post('/select-delivery-home','DeliveryController@select_delivery_home');

Route::post('/calculate-fee','CheckoutController@calculate_fee');

Route::get('/del-fee','CheckoutController@del_fee');

Route::post('/confirm-order','CheckoutController@confirm_order');


//authenticasion roles
Route::get('/register-auth','AuthController@register_auth');
Route::get('/login-auth','AuthController@login_auth');
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');
Route::get('/logout-auth','AuthController@logout_auth');

// order_manager
Route::get('/manage-order','OrderController@manage_order');

Route::get('/history','OrderController@history');
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');







//van chuyen

Route::post('/filter-by-date','AdminController@filter_by_date');



