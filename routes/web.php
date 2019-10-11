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


Route::get('logout', 'MainController@logout');
Route::get('/', 'MainController@index');
Route::get('/about', 'MainController@about');
Route::get('/service', 'MainController@service');
Route::get('/gallery', 'MainController@gallery');
Route::get('/contact', 'MainController@contact');
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/log_out', 'MainController@log_out')->name('log_out');
Auth::routes();
Route::group(['prefix' => 'setting', 'middleware' => 'auth', 'as' => 'setting.'], function () {
     Route::resource('role', 'RoleController');
});

Route::group(['middleware' => 'auth'], function () {


     Route::get('/dashboard', 'HomeController@index')->name('dashboard');
     Route::get('/file', 'HomeController@file');
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
     Route::get('/profile/user-profile', 'ProfileController@index');
     Route::post('/profile/update-profile', 'ProfileController@update');
     Route::get('/profile/change-password', 'ProfileController@change_password');
     Route::post('/profile/update-password', 'ProfileController@update_password');
});

Route::group([
    'prefix' => 'abouts',
], function () {
    Route::get('/', 'AboutsController@index')
         ->name('abouts.about.index');
    Route::get('/create','AboutsController@create')
         ->name('abouts.about.create');
    Route::get('/show/{about}','AboutsController@show')
         ->name('abouts.about.show')->where('id', '[0-9]+');
    Route::get('/{about}/edit','AboutsController@edit')
         ->name('abouts.about.edit')->where('id', '[0-9]+');
    Route::post('/', 'AboutsController@store')
         ->name('abouts.about.store');
    Route::put('about/{about}', 'AboutsController@update')
         ->name('abouts.about.update')->where('id', '[0-9]+');
    Route::delete('/about/{about}','AboutsController@destroy')
         ->name('abouts.about.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'contacts',
], function () {
    Route::get('/', 'ContactsController@index')
         ->name('contacts.contact.index');
    Route::get('/create','ContactsController@create')
         ->name('contacts.contact.create');
    Route::get('/show/{contact}','ContactsController@show')
         ->name('contacts.contact.show')->where('id', '[0-9]+');
    Route::get('/{contact}/edit','ContactsController@edit')
         ->name('contacts.contact.edit')->where('id', '[0-9]+');
    Route::post('/', 'ContactsController@store')
         ->name('contacts.contact.store');
    Route::put('contact/{contact}', 'ContactsController@update')
         ->name('contacts.contact.update')->where('id', '[0-9]+');
    Route::delete('/contact/{contact}','ContactsController@destroy')
         ->name('contacts.contact.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'home_sliders',
], function () {
    Route::get('/', 'HomeSlidersController@index')
         ->name('home_sliders.home_slider.index');
    Route::get('/create','HomeSlidersController@create')
         ->name('home_sliders.home_slider.create');
    Route::get('/show/{homeSlider}','HomeSlidersController@show')
         ->name('home_sliders.home_slider.show')->where('id', '[0-9]+');
    Route::get('/{homeSlider}/edit','HomeSlidersController@edit')
         ->name('home_sliders.home_slider.edit')->where('id', '[0-9]+');
    Route::post('/', 'HomeSlidersController@store')
         ->name('home_sliders.home_slider.store');
    Route::put('home_slider/{homeSlider}', 'HomeSlidersController@update')
         ->name('home_sliders.home_slider.update')->where('id', '[0-9]+');
    Route::delete('/home_slider/{homeSlider}','HomeSlidersController@destroy')
         ->name('home_sliders.home_slider.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'services',
], function () {
    Route::get('/', 'ServicesController@index')
         ->name('services.service.index');
    Route::get('/create','ServicesController@create')
         ->name('services.service.create');
    Route::get('/show/{service}','ServicesController@show')
         ->name('services.service.show')->where('id', '[0-9]+');
    Route::get('/{service}/edit','ServicesController@edit')
         ->name('services.service.edit')->where('id', '[0-9]+');
    Route::post('/', 'ServicesController@store')
         ->name('services.service.store');
    Route::put('service/{service}', 'ServicesController@update')
         ->name('services.service.update')->where('id', '[0-9]+');
    Route::delete('/service/{service}','ServicesController@destroy')
         ->name('services.service.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'teams',
], function () {
    Route::get('/', 'TeamsController@index')
         ->name('teams.team.index');
    Route::get('/create','TeamsController@create')
         ->name('teams.team.create');
    Route::get('/show/{team}','TeamsController@show')
         ->name('teams.team.show')->where('id', '[0-9]+');
    Route::get('/{team}/edit','TeamsController@edit')
         ->name('teams.team.edit')->where('id', '[0-9]+');
    Route::post('/', 'TeamsController@store')
         ->name('teams.team.store');
    Route::put('team/{team}', 'TeamsController@update')
         ->name('teams.team.update')->where('id', '[0-9]+');
    Route::delete('/team/{team}','TeamsController@destroy')
         ->name('teams.team.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'testimonials',
], function () {
    Route::get('/', 'TestimonialsController@index')
         ->name('testimonials.testimonial.index');
    Route::get('/create','TestimonialsController@create')
         ->name('testimonials.testimonial.create');
    Route::get('/show/{testimonial}','TestimonialsController@show')
         ->name('testimonials.testimonial.show')->where('id', '[0-9]+');
    Route::get('/{testimonial}/edit','TestimonialsController@edit')
         ->name('testimonials.testimonial.edit')->where('id', '[0-9]+');
    Route::post('/', 'TestimonialsController@store')
         ->name('testimonials.testimonial.store');
    Route::put('testimonial/{testimonial}', 'TestimonialsController@update')
         ->name('testimonials.testimonial.update')->where('id', '[0-9]+');
    Route::delete('/testimonial/{testimonial}','TestimonialsController@destroy')
         ->name('testimonials.testimonial.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'offers',
], function () {
    Route::get('/', 'OffersController@index')
         ->name('offers.offer.index');
    Route::get('/create','OffersController@create')
         ->name('offers.offer.create');
    Route::get('/show/{offer}','OffersController@show')
         ->name('offers.offer.show')->where('id', '[0-9]+');
    Route::get('/{offer}/edit','OffersController@edit')
         ->name('offers.offer.edit')->where('id', '[0-9]+');
    Route::post('/', 'OffersController@store')
         ->name('offers.offer.store');
    Route::put('offer/{offer}', 'OffersController@update')
         ->name('offers.offer.update')->where('id', '[0-9]+');
    Route::delete('/offer/{offer}','OffersController@destroy')
         ->name('offers.offer.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'previous_works',
], function () {
    Route::get('/', 'PreviousWorksController@index')
         ->name('previous_works.previous_work.index');
    Route::get('/create','PreviousWorksController@create')
         ->name('previous_works.previous_work.create');
    Route::get('/show/{previousWork}','PreviousWorksController@show')
         ->name('previous_works.previous_work.show')->where('id', '[0-9]+');
    Route::get('/{previousWork}/edit','PreviousWorksController@edit')
         ->name('previous_works.previous_work.edit')->where('id', '[0-9]+');
    Route::post('/', 'PreviousWorksController@store')
         ->name('previous_works.previous_work.store');
    Route::put('previous_work/{previousWork}', 'PreviousWorksController@update')
         ->name('previous_works.previous_work.update')->where('id', '[0-9]+');
    Route::delete('/previous_work/{previousWork}','PreviousWorksController@destroy')
         ->name('previous_works.previous_work.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'galleries',
], function () {
    Route::get('/', 'GalleriesController@index')
         ->name('galleries.gallery.index');
    Route::get('/create','GalleriesController@create')
         ->name('galleries.gallery.create');
    Route::get('/show/{gallery}','GalleriesController@show')
         ->name('galleries.gallery.show')->where('id', '[0-9]+');
    Route::get('/{gallery}/edit','GalleriesController@edit')
         ->name('galleries.gallery.edit')->where('id', '[0-9]+');
    Route::post('/', 'GalleriesController@store')
         ->name('galleries.gallery.store');
    Route::put('gallery/{gallery}', 'GalleriesController@update')
         ->name('galleries.gallery.update')->where('id', '[0-9]+');
    Route::delete('/gallery/{gallery}','GalleriesController@destroy')
         ->name('galleries.gallery.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'partners',
], function () {
    Route::get('/', 'PartnersController@index')
         ->name('partners.partner.index');
    Route::get('/create','PartnersController@create')
         ->name('partners.partner.create');
    Route::get('/show/{partner}','PartnersController@show')
         ->name('partners.partner.show')->where('id', '[0-9]+');
    Route::get('/{partner}/edit','PartnersController@edit')
         ->name('partners.partner.edit')->where('id', '[0-9]+');
    Route::post('/', 'PartnersController@store')
         ->name('partners.partner.store');
    Route::put('partner/{partner}', 'PartnersController@update')
         ->name('partners.partner.update')->where('id', '[0-9]+');
    Route::delete('/partner/{partner}','PartnersController@destroy')
         ->name('partners.partner.destroy')->where('id', '[0-9]+');
});
