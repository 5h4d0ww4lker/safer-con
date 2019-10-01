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

use App\Designation;
use Illuminate\Http\Request;

Route::get('/information/create/ajax-state', function (Request $request) {

     $department_id = $request->department_id;
     $department_id = ltrim($department_id, "'");

     //die(print_r($department_id));
     $subcategories = Designation::where('department_id', $department_id)->get();


     return $subcategories;
});
Route::get('logout', 'MainController@logout');
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/sign-in', 'Auth\UserLoginController@login')->name('sign-in');
Route::post('/add_to_cart', 'MainController@add_to_cart')->name('add_to_cart');

Route::post('/submit_order', 'MainController@submit_order')->name('submit_order');
Route::get('/search_item', 'MainController@search_item')->name('search_item');
Route::post('/search_result', 'MainController@search_result')->name('search_result');
Route::post('/update_profile', 'MainController@update_profile')->name('update_profile');
Route::get('/add_shipment/{id}', 'MainController@add_shipment')->name('add_shipment');
Route::post('/submit_shipment_info', 'MainController@submit_shipment_info')->name('submit_shipment_info');

Route::post('/sign-up', 'MainController@storeCustomer')->name('sign-up');
Route::get('/profile', 'MainController@profile')->name('profile');
Route::get('/my_transactions', 'MainController@my_transactions')->name('my_transactions');
Route::get('/credit_info', 'MainController@credit_info')->name('credit_info');
Route::get('/my_credit_info', 'CreditsController@my_credit_info')->name('my_credit_info');
Route::get('/my_notifications', 'MainController@my_notifications')->name('my_notifications');
Route::get('/order_details/{id}', 'MainController@order_details')->name('order_details');

Route::get('/my_credit_requests', 'MainController@my_credit_requests')->name('my_credit_requests');
Route::get('/request_credit', 'MainController@request_credit')->name('request_credit');
Route::post('/submit_credit_request', 'MainController@submit_credit_request')->name('submit_credit_request');
Route::get('/log_out', 'MainController@log_out')->name('log_out');
Route::get('/change_password', 'MainController@change_password');
Route::post('/update_password', 'MainController@update_password');
Route::get('/reset_password', 'MainController@reset_password');
Route::post('/send_reset_key', 'MainController@send_reset_key');
Route::get('/finalize_reset', 'MainController@finalize_reset');
Route::post('/complete_reset', 'MainController@complete_reset');

Route::get('/finalize_registration', 'MainController@finalize_registration');
Route::post('/complete_registration', 'MainController@complete_registration');

Route::get('/admin/reset_password', 'SuperAdminController@reset_password');
Route::post('/admin/send_reset_key', 'SuperAdminController@send_reset_key');
Route::get('/admin/finalize_reset', 'SuperAdminController@finalize_reset');
Route::post('/admin/complete_reset', 'SuperAdminController@complete_reset');

Auth::routes();

Route::group(['prefix' => 'setting', 'middleware' => 'auth', 'as' => 'setting.'], function () {
     Route::resource('role', 'RoleController');
});
// Route::group(['middleware' => 'auth'], function() {
// 	
Route::get('/', 'MainController@index')->name('home_page');
Route::get('/products', 'MainController@products')->name('products');
Route::get('/products_by_name', 'MainController@products_by_name')->name('products_by_name');
Route::get('/products_by_date', 'MainController@products_by_date')->name('products_by_date');

Route::get('/account', 'MainController@account')->name('account');
Route::get('/product_details/{id}', 'MainController@product_details')->name('product_details');
Route::get('/add_to_wishlist/{id}', 'MainController@add_to_wishlist')->name('add_to_wishlist');
Route::get('/remove_from_cart/{id}', 'MainController@remove_from_cart')->name('remove_from_cart');
Route::get('/remove_from_wishlist/{id}', 'MainController@remove_from_wishlist')->name('remove_from_wishlist');

Route::get('/cancel_order/{id}', 'MainController@cancel_order')->name('cancel_order');
Route::get('/confirm_order/{id}', 'MainController@confirm_order')->name('confirm_order');

Route::get('/byCategory/{id}', 'MainController@byCategory')->name('byCategory');
Route::get('/byBrand/{id}', 'MainController@byBrand')->name('byBrand');
Route::get('/cart', 'MainController@cart')->name('cart');
Route::get('/my_wishlists', 'MainController@my_wishlists')->name('my_wishlists');
Route::get('/my_orders', 'MainController@my_orders')->name('my_orders');
Route::get('/contact', 'MainController@contact')->name('contact');
Route::get('/contact', 'MainController@contact')->name('contact');
Route::get('/register_merchant', 'SuperAdminController@register_merchant');
Route::post('/store_merchant', 'SuperAdminController@store_merchant');
Route::get('/check_status', 'MainCOntroller@check_status');

// });
Route::group(['middleware' => 'auth'], function () {


     Route::get('/dashboard', 'HomeController@index')->name('dashboard');
     Route::get('/file', 'HomeController@file');
     // Super Admins Section //
     Route::get('/setting/super_admins', 'SuperAdminController@index')->middleware('checkPermission:show_admin');
     Route::get('/setting/merchants', 'SuperAdminController@merchants')->middleware('checkPermission:show_merchant');
     Route::get('/setting/users', 'SuperAdminController@users')->middleware('checkPermission:show_user');

     Route::get('/setting/super_admins/create', 'SuperAdminController@create')->middleware('checkPermission:add_user');
     Route::post('/setting/super_admins/store', 'SuperAdminController@store')->middleware('checkPermission:add_user');
     Route::get('/setting/super_admins/published/{id}', 'SuperAdminController@published')->middleware('checkPermission:manage_user');
     Route::get('/setting/super_admins/unpublished/{id}', 'SuperAdminController@unpublished')->middleware('checkPermission:manage_user');
     Route::get('/setting/super_admins/details/{id}', 'SuperAdminController@show')->middleware('checkPermission:manage_user');
     Route::get('/setting/super_admins/edit/{id}', 'SuperAdminController@edit')->middleware('checkPermission:edit_user');
     Route::post('/setting/super_admins/update/{id}', 'SuperAdminController@update')->middleware('checkPermission:edit_user');
     Route::get('/setting/super_admins/delete/{id}', 'SuperAdminController@destroy')->middleware('checkPermission:delete_user');

     // Profile Section
     Route::get('/profile/user-profile', 'ProfileController@index');
     Route::post('/profile/update-profile', 'ProfileController@update');
     Route::get('/profile/change-password', 'ProfileController@change_password');
     Route::post('/profile/update-password', 'ProfileController@update_password');
     //SEARCH SECTION

     //REPORTS SECTION

     // Profile Section
     Route::get('/items/excel', 'ReportsController@itemsExcel');
     Route::get('/items/pdf', 'ReportsController@itemsPDF');

     Route::get('/orders/excel', 'ReportsController@ordersExcel');
     Route::get('/orders/pdf', 'ReportsController@ordersPDF');

     Route::get('/transactions/excel', 'ReportsController@transactionsExcel');
     Route::get('/transactions/pdf', 'ReportsController@transactionsPDF');


     Route::get('/credits/excel', 'ReportsController@creditsExcel');
     Route::get('/credits/pdf', 'ReportsController@creditsPDF');

     Route::get('/payRates/excel', 'ReportsController@payRatesExcel');
     Route::get('/payRates/pdf', 'ReportsController@payRatesPDF');



     // Members Section

     Route::get('/members', 'MemberController@index');
     Route::get('/members/create', 'MemberController@create')->middleware('checkPermission:add-member');
     Route::post('/members/store', 'MemberController@store')->middleware('checkPermission:add-member');
     Route::get('/members/published/{id}', 'MemberController@published')->middleware('checkPermission:manage-member');
     Route::get('/members/unpublished/{id}', 'MemberController@unpublished')->middleware('checkPermission:manage-member');
     Route::get('/members/details/{id}', 'MemberController@show')->middleware('checkPermission:manage-member');
     Route::get('/members/edit/{id}', 'MemberController@edit')->middleware('checkPermission:edit-member');
     Route::post('/members/update/{id}', 'MemberController@update')->middleware('checkPermission:edit-member');
     Route::get('/members/delete/{id}', 'MemberController@destroy')->middleware('checkPermission:delete-member');
});
Route::group([
     'prefix' => 'asset_categories',
], function () {
     Route::get('/', 'AssetCategoriesController@index')
          ->name('asset_categories.asset_category.index');
     Route::get('/create', 'AssetCategoriesController@create')
          ->name('asset_categories.asset_category.create');
     Route::get('/show/{assetCategory}', 'AssetCategoriesController@show')
          ->name('asset_categories.asset_category.show')->where('id', '[0-9]+');
     Route::get('/{assetCategory}/edit', 'AssetCategoriesController@edit')
          ->name('asset_categories.asset_category.edit')->where('id', '[0-9]+');
     Route::post('/', 'AssetCategoriesController@store')
          ->name('asset_categories.asset_category.store');
     Route::put('asset_category/{assetCategory}', 'AssetCategoriesController@update')
          ->name('asset_categories.asset_category.update')->where('id', '[0-9]+');
     Route::delete('/asset_category/{assetCategory}', 'AssetCategoriesController@destroy')
          ->name('asset_categories.asset_category.destroy')->where('id', '[0-9]+');
});
// Route::get('admin', function () {
//      return view('admin_template');
//  });
Route::group([
     'prefix' => 'categories',
], function () {
     Route::get('/', 'CategoriesController@index')
          ->name('categories.category.index')->middleware('checkPermission:show_category');
     Route::get('/create', 'CategoriesController@create')->name('categories.category.create')->middleware('checkPermission:add_category');
     Route::get('/show/{category}', 'CategoriesController@show')
          ->name('categories.category.show')->where('id', '[0-9]+')->middleware('checkPermission:show_category');
     Route::get('/{category}/edit', 'CategoriesController@edit')
          ->name('categories.category.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_category');
     Route::post('/', 'CategoriesController@store')
          ->name('categories.category.store')->middleware('checkPermission:add_category');
     Route::put('category/{category}', 'CategoriesController@update')
          ->name('categories.category.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_category');
     Route::delete('/category/{category}', 'CategoriesController@destroy')
          ->name('categories.category.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_category');
});

Route::group([
     'prefix' => 'brands',
], function () {
     Route::get('/', 'BrandsController@index')
          ->name('brands.brand.index')->middleware('checkPermission:show_brand');
     Route::get('/create', 'BrandsController@create')
          ->name('brands.brand.create')->middleware('checkPermission:add_brand');
     Route::get('/show/{brand}', 'BrandsController@show')
          ->name('brands.brand.show')->where('id', '[0-9]+')->middleware('checkPermission:show_brand');
     Route::get('/{brand}/edit', 'BrandsController@edit')
          ->name('brands.brand.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_brand');
     Route::post('/', 'BrandsController@store')
          ->name('brands.brand.store')->middleware('checkPermission:add_brand');
     Route::put('brand/{brand}', 'BrandsController@update')
          ->name('brands.brand.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_brand');
     Route::delete('/brand/{brand}', 'BrandsController@destroy')
          ->name('brands.brand.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_brand');
});


Route::group([
     'prefix' => 'orders',
], function () {
     Route::get('/', 'OrdersController@index')
          ->name('orders.order.index')->middleware('checkPermission:show_order');
     Route::get('/create', 'OrdersController@create')
          ->name('orders.order.create')->middleware('checkPermission:add_order');
     Route::get('/show/{order}', 'OrdersController@show')
          ->name('orders.order.show')->where('id', '[0-9]+')->middleware('checkPermission:show_order');
     Route::get('/{order}/edit', 'OrdersController@edit')
          ->name('orders.order.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_order');
     Route::post('/', 'OrdersController@store')
          ->name('orders.order.store')->middleware('checkPermission:add_order');
     Route::put('order/{order}', 'OrdersController@update')
          ->name('orders.order.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_sub_category');
     Route::delete('/order/{order}', 'OrdersController@destroy')
          ->name('orders.order.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_order');
});

Route::group([
     'prefix' => 'sub_categories',
], function () {
     Route::get('/', 'SubCategoriesController@index')
          ->name('sub_categories.sub_category.index')->middleware('checkPermission:show_sub_category');
     Route::get('/create', 'SubCategoriesController@create')
          ->name('sub_categories.sub_category.create')->middleware('checkPermission:add_sub_category');
     Route::get('/show/{subCategory}', 'SubCategoriesController@show')
          ->name('sub_categories.sub_category.show')->where('id', '[0-9]+')->middleware('checkPermission:show_sub_category');
     Route::get('/{subCategory}/edit', 'SubCategoriesController@edit')
          ->name('sub_categories.sub_category.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_sub_category');
     Route::post('/', 'SubCategoriesController@store')
          ->name('sub_categories.sub_category.store')->middleware('checkPermission:add_sub_category');
     Route::put('sub_category/{subCategory}', 'SubCategoriesController@update')
          ->name('sub_categories.sub_category.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_sub_category');
     Route::delete('/sub_category/{subCategory}', 'SubCategoriesController@destroy')
          ->name('sub_categories.sub_category.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_sub_category');
});

Route::group([
     'prefix' => 'merchants',
], function () {
     Route::get('/', 'MerchantsController@index')
          ->name('merchants.merchant.index');
     Route::get('/create', 'MerchantsController@create')
          ->name('merchants.merchant.create');
     Route::get('/show/{merchant}', 'MerchantsController@show')
          ->name('merchants.merchant.show')->where('id', '[0-9]+');
     Route::get('/{merchant}/edit', 'MerchantsController@edit')
          ->name('merchants.merchant.edit')->where('id', '[0-9]+');
     Route::post('/', 'MerchantsController@store')
          ->name('merchants.merchant.store');
     Route::put('merchant/{merchant}', 'MerchantsController@update')
          ->name('merchants.merchant.update')->where('id', '[0-9]+');
     Route::delete('/merchant/{merchant}', 'MerchantsController@destroy')
          ->name('merchants.merchant.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'items',
], function () {
     Route::get('/', 'ItemsController@index')
          ->name('items.item.index')->middleware('checkPermission:show_item');
     Route::get('/create', 'ItemsController@create')
          ->name('items.item.create')->middleware('checkPermission:add_item');
     Route::get('/show/{item}', 'ItemsController@show')
          ->name('items.item.show')->where('id', '[0-9]+')->middleware('checkPermission:show_item');
     Route::get('/{item}/edit', 'ItemsController@edit')
          ->name('items.item.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_item');
     Route::post('/', 'ItemsController@store')
          ->name('items.item.store')->middleware('checkPermission:add_item');
     Route::put('item/{item}', 'ItemsController@update')
          ->name('items.item.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_item');
     Route::delete('/item/{item}', 'ItemsController@destroy')
          ->name('items.item.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_item');
});

Route::group([
     'prefix' => 'complaints',
], function () {
     Route::get('/', 'ComplaintsController@index')
          ->name('complaints.complaint.index');
     Route::get('/create', 'ComplaintsController@create')
          ->name('complaints.complaint.create');
     Route::get('/show/{complaint}', 'ComplaintsController@show')
          ->name('complaints.complaint.show')->where('id', '[0-9]+');
     Route::get('/{complaint}/edit', 'ComplaintsController@edit')
          ->name('complaints.complaint.edit')->where('id', '[0-9]+');
     Route::post('/', 'ComplaintsController@store')
          ->name('complaints.complaint.store');
     Route::put('complaint/{complaint}', 'ComplaintsController@update')
          ->name('complaints.complaint.update')->where('id', '[0-9]+');
     Route::delete('/complaint/{complaint}', 'ComplaintsController@destroy')
          ->name('complaints.complaint.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'wishlists',
], function () {
     Route::get('/', 'WishlistsController@index')
          ->name('wishlists.wishlist.index');
     Route::get('/create', 'WishlistsController@create')
          ->name('wishlists.wishlist.create');
     Route::get('/show/{wishlist}', 'WishlistsController@show')
          ->name('wishlists.wishlist.show')->where('id', '[0-9]+');
     Route::get('/{wishlist}/edit', 'WishlistsController@edit')
          ->name('wishlists.wishlist.edit')->where('id', '[0-9]+');
     Route::post('/', 'WishlistsController@store')
          ->name('wishlists.wishlist.store');
     Route::put('wishlist/{wishlist}', 'WishlistsController@update')
          ->name('wishlists.wishlist.update')->where('id', '[0-9]+');
     Route::delete('/wishlist/{wishlist}', 'WishlistsController@destroy')
          ->name('wishlists.wishlist.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'item_details',
], function () {
     Route::get('/', 'ItemDetailsController@index')
          ->name('item_details.item_detail.index')->middleware('checkPermission:show_item_detail');
     Route::get('/create', 'ItemDetailsController@create')
          ->name('item_details.item_detail.create')->middleware('checkPermission:add_item_detail');
     Route::get('/show/{itemDetail}', 'ItemDetailsController@show')
          ->name('item_details.item_detail.show')->where('id', '[0-9]+')->middleware('checkPermission:show_item_detail');
     Route::get('/{itemDetail}/edit', 'ItemDetailsController@edit')
          ->name('item_details.item_detail.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_item_detail');
     Route::post('/', 'ItemDetailsController@store')
          ->name('item_details.item_detail.store')->middleware('checkPermission:add_item_detail');
     Route::put('item_detail/{itemDetail}', 'ItemDetailsController@update')
          ->name('item_details.item_detail.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_item_detail');
     Route::delete('/item_detail/{itemDetail}', 'ItemDetailsController@destroy')
          ->name('item_details.item_detail.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_item_detail');
});

Route::group([
     'prefix' => 'ratings',
], function () {
     Route::get('/', 'RatingsController@index')
          ->name('ratings.rating.index');
     Route::get('/create', 'RatingsController@create')
          ->name('ratings.rating.create');
     Route::get('/show/{rating}', 'RatingsController@show')
          ->name('ratings.rating.show')->where('id', '[0-9]+');
     Route::get('/{rating}/edit', 'RatingsController@edit')
          ->name('ratings.rating.edit')->where('id', '[0-9]+');
     Route::post('/', 'RatingsController@store')
          ->name('ratings.rating.store');
     Route::put('rating/{rating}', 'RatingsController@update')
          ->name('ratings.rating.update')->where('id', '[0-9]+');
     Route::delete('/rating/{rating}', 'RatingsController@destroy')
          ->name('ratings.rating.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'reviews',
], function () {
     Route::get('/', 'ReviewsController@index')
          ->name('reviews.review.index');
     Route::get('/create', 'ReviewsController@create')
          ->name('reviews.review.create');
     Route::get('/show/{review}', 'ReviewsController@show')
          ->name('reviews.review.show')->where('id', '[0-9]+');
     Route::get('/{review}/edit', 'ReviewsController@edit')
          ->name('reviews.review.edit')->where('id', '[0-9]+');
     Route::post('/', 'ReviewsController@store')
          ->name('reviews.review.store');
     Route::put('review/{review}', 'ReviewsController@update')
          ->name('reviews.review.update')->where('id', '[0-9]+');
     Route::delete('/review/{review}', 'ReviewsController@destroy')
          ->name('reviews.review.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'transactions',
], function () {
     Route::get('/', 'TransactionsController@index')
          ->name('transactions.transaction.index')->middleware('checkPermission:show_transaction');
     Route::get('/create', 'TransactionsController@create')
          ->name('transactions.transaction.create')->middleware('checkPermission:add_transaction');
     Route::get('/show/{transaction}', 'TransactionsController@show')
          ->name('transactions.transaction.show')->where('id', '[0-9]+')->middleware('checkPermission:show_transaction');
     Route::get('/{transaction}/edit', 'TransactionsController@edit')
          ->name('transactions.transaction.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_transaction');
     Route::post('/', 'TransactionsController@store')
          ->name('transactions.transaction.store')->middleware('checkPermission:add_transaction');
     Route::put('transaction/{transaction}', 'TransactionsController@update')
          ->name('transactions.transaction.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_transaction');
     Route::delete('/transaction/{transaction}', 'TransactionsController@destroy')
          ->name('transactions.transaction.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_transaction');
});

Route::group([
     'prefix' => 'credits',
], function () {
     Route::get('/', 'CreditsController@index')
          ->name('credits.credit.index')->middleware('checkPermission:show_credit');
     Route::get('/create', 'CreditsController@create')
          ->name('credits.credit.create')->middleware('checkPermission:add_credit');
     Route::get('/show/{credit}', 'CreditsController@show')
          ->name('credits.credit.show')->where('id', '[0-9]+')->middleware('checkPermission:show_credit');
     Route::get('/{credit}/edit', 'CreditsController@edit')
          ->name('credits.credit.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_credit');
     Route::post('/', 'CreditsController@store')
          ->name('credits.credit.store')->middleware('checkPermission:add_credit');
     Route::put('credit/{credit}', 'CreditsController@update')
          ->name('credits.credit.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_credit');
     Route::delete('/credit/{credit}', 'CreditsController@destroy')
          ->name('credits.credit.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_credit');
});

Route::group([
     'prefix' => 'search_histories',
], function () {
     Route::get('/', 'SearchHistoriesController@index')
          ->name('search_histories.search_history.index');
     Route::get('/create', 'SearchHistoriesController@create')
          ->name('search_histories.search_history.create');
     Route::get('/show/{searchHistory}', 'SearchHistoriesController@show')
          ->name('search_histories.search_history.show')->where('id', '[0-9]+');
     Route::get('/{searchHistory}/edit', 'SearchHistoriesController@edit')
          ->name('search_histories.search_history.edit')->where('id', '[0-9]+');
     Route::post('/', 'SearchHistoriesController@store')
          ->name('search_histories.search_history.store');
     Route::put('search_history/{searchHistory}', 'SearchHistoriesController@update')
          ->name('search_histories.search_history.update')->where('id', '[0-9]+');
     Route::delete('/search_history/{searchHistory}', 'SearchHistoriesController@destroy')
          ->name('search_histories.search_history.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'shopping_carts',
], function () {
     Route::get('/', 'ShoppingCartsController@index')
          ->name('shopping_carts.shopping_cart.index');
     Route::get('/create', 'ShoppingCartsController@create')
          ->name('shopping_carts.shopping_cart.create');
     Route::get('/show/{shoppingCart}', 'ShoppingCartsController@show')
          ->name('shopping_carts.shopping_cart.show')->where('id', '[0-9]+');
     Route::get('/{shoppingCart}/edit', 'ShoppingCartsController@edit')
          ->name('shopping_carts.shopping_cart.edit')->where('id', '[0-9]+');
     Route::post('/', 'ShoppingCartsController@store')
          ->name('shopping_carts.shopping_cart.store');
     Route::put('shopping_cart/{shoppingCart}', 'ShoppingCartsController@update')
          ->name('shopping_carts.shopping_cart.update')->where('id', '[0-9]+');
     Route::delete('/shopping_cart/{shoppingCart}', 'ShoppingCartsController@destroy')
          ->name('shopping_carts.shopping_cart.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'pay_rates',
], function () {
     Route::get('/', 'PayRatesController@index')
          ->name('pay_rates.pay_rate.index')->middleware('checkPermission:show_pay_rate');
     Route::get('/create', 'PayRatesController@create')
          ->name('pay_rates.pay_rate.create')->middleware('checkPermission:add_pay_rate');
     Route::get('/show/{payRate}', 'PayRatesController@show')
          ->name('pay_rates.pay_rate.show')->where('id', '[0-9]+')->middleware('checkPermission:show_pay_rate');
     Route::get('/{payRate}/edit', 'PayRatesController@edit')
          ->name('pay_rates.pay_rate.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_pay_rate');
     Route::post('/', 'PayRatesController@store')
          ->name('pay_rates.pay_rate.store')->middleware('checkPermission:add_pay_rate');
     Route::put('pay_rate/{payRate}', 'PayRatesController@update')
          ->name('pay_rates.pay_rate.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_pay_rate');
     Route::delete('/pay_rate/{payRate}', 'PayRatesController@destroy')
          ->name('pay_rates.pay_rate.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_pay_rate');
});

Route::group([
     'prefix' => 'credit_requests',
], function () {
     Route::get('/', 'CreditRequestsController@index')
          ->name('credit_requests.credit_request.index')->middleware('checkPermission:show_credit_request');
     Route::get('/my_requests', 'CreditRequestsController@my_requests')
          ->name('credit_requests.credit_request.my_requests')->middleware('checkPermission:show_credit_request');
     Route::get('/create', 'CreditRequestsController@create')
          ->name('credit_requests.credit_request.create')->middleware('checkPermission:add_credit_request');
     Route::get('/request_credit', 'CreditRequestsController@request_credit')
          ->name('credit_requests.credit_request.request_credit');
     Route::get('/show/{creditRequest}', 'CreditRequestsController@show')
          ->name('credit_requests.credit_request.show')->where('id', '[0-9]+')->middleware('checkPermission:show_credit_request');
     Route::get('/{creditRequest}/edit', 'CreditRequestsController@edit')
          ->name('credit_requests.credit_request.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_credit_request');
     Route::post('/', 'CreditRequestsController@store')
          ->name('credit_requests.credit_request.store')->middleware('checkPermission:edit_credit_request');


     Route::post('/', 'CreditRequestsController@submit_request')
          ->name('credit_requests.credit_request.submit_request');
     Route::put('credit_request/{creditRequest}', 'CreditRequestsController@update')
          ->name('credit_requests.credit_request.update')->where('id', '[0-9]+');
     Route::delete('/credit_request/{creditRequest}', 'CreditRequestsController@destroy')
          ->name('credit_requests.credit_request.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'banks',
], function () {
     Route::get('/', 'BanksController@index')
          ->name('banks.bank.index')->middleware('checkPermission:show_bank');
     Route::get('/create', 'BanksController@create')
          ->name('banks.bank.create')->middleware('checkPermission:add_bank');
     Route::get('/show/{bank}', 'BanksController@show')
          ->name('banks.bank.show')->where('id', '[0-9]+')->middleware('checkPermission:show_bank');
     Route::get('/{bank}/edit', 'BanksController@edit')
          ->name('banks.bank.edit')->where('id', '[0-9]+')->middleware('checkPermission:edit_bank');
     Route::post('/', 'BanksController@store')
          ->name('banks.bank.store')->middleware('checkPermission:add_bank');
     Route::put('bank/{bank}', 'BanksController@update')
          ->name('banks.bank.update')->where('id', '[0-9]+')->middleware('checkPermission:edit_bank');
     Route::delete('/bank/{bank}', 'BanksController@destroy')
          ->name('banks.bank.destroy')->where('id', '[0-9]+')->middleware('checkPermission:delete_bank');
});

Route::group([
     'prefix' => 'notifications',
], function () {
     Route::get('/', 'NotificationsController@index')
          ->name('notifications.notification.index');
     Route::get('/create', 'NotificationsController@create')
          ->name('notifications.notification.create');
     Route::get('/show/{notification}', 'NotificationsController@show')
          ->name('notifications.notification.show')->where('id', '[0-9]+');
     Route::get('/{notification}/edit', 'NotificationsController@edit')
          ->name('notifications.notification.edit')->where('id', '[0-9]+');
     Route::post('/', 'NotificationsController@store')
          ->name('notifications.notification.store');
     Route::put('notification/{notification}', 'NotificationsController@update')
          ->name('notifications.notification.update')->where('id', '[0-9]+');
     Route::delete('/notification/{notification}', 'NotificationsController@destroy')
          ->name('notifications.notification.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'landing_pages',
], function () {
     Route::get('/', 'LandingPagesController@index')
          ->name('landing_pages.landing_page.index');
     Route::get('/create', 'LandingPagesController@create')
          ->name('landing_pages.landing_page.create');
     Route::get('/show/{landingPage}', 'LandingPagesController@show')
          ->name('landing_pages.landing_page.show')->where('id', '[0-9]+');
     Route::get('/{landingPage}/edit', 'LandingPagesController@edit')
          ->name('landing_pages.landing_page.edit')->where('id', '[0-9]+');
     Route::post('/', 'LandingPagesController@store')
          ->name('landing_pages.landing_page.store');
     Route::put('landing_page/{landingPage}', 'LandingPagesController@update')
          ->name('landing_pages.landing_page.update')->where('id', '[0-9]+');
     Route::delete('/landing_page/{landingPage}', 'LandingPagesController@destroy')
          ->name('landing_pages.landing_page.destroy')->where('id', '[0-9]+');
});

Route::group([
     'prefix' => 'contacts',
], function () {
     Route::get('/', 'ContactsController@index')
          ->name('contacts.contact.index');
     Route::get('/create', 'ContactsController@create')
          ->name('contacts.contact.create');
     Route::get('/show/{contact}', 'ContactsController@show')
          ->name('contacts.contact.show')->where('id', '[0-9]+');
     Route::get('/{contact}/edit', 'ContactsController@edit')
          ->name('contacts.contact.edit')->where('id', '[0-9]+');
     Route::post('/', 'ContactsController@store')
          ->name('contacts.contact.store');
     Route::put('contact/{contact}', 'ContactsController@update')
          ->name('contacts.contact.update')->where('id', '[0-9]+');
     Route::delete('/contact/{contact}', 'ContactsController@destroy')
          ->name('contacts.contact.destroy')->where('id', '[0-9]+');
});
